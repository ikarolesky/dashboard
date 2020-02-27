<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\Hash;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

/**
 * @property Website website
 * @property Hostname hostname
 * @property User admin
 */
class Tenant
{
    public function __construct(Website $website = null, Hostname $hostname = null, User $admin = null)
    {
        $this->website = $website;
        $this->hostname = $hostname;
        $this->admin = $admin;
    }

    public static function delete($subdomain)
    {
        $baseUrl = config('tenancy.hostname.default');
        $subdomain = "{$subdomain}.{$baseUrl}";
        if ($tenant = Hostname::where('fqdn', $subdomain)->firstOrFail()) {
            app(HostnameRepository::class)->delete($tenant, true);
            app(WebsiteRepository::class)->delete($tenant->website, true);
            return "Tenant {$subdomain} successfully deleted.";
        }
    }

    public static function deleteByFqdn($fqdn)
    {
        if ($tenant = Hostname::where('fqdn', $fqdn)->firstOrFail()) {
            app(HostnameRepository::class)->delete($tenant, true);
            app(WebsiteRepository::class)->delete($tenant->website, true);
            return "Tenant {$fqdn} successfully deleted.";
        }
    }

    public static function registerTenant($name, $email, $password,$phone,$doc, $subdomain, $company): Tenant
    {
        // Convert all to lowercase
        $subdomain = strtolower($subdomain);
        $email = strtolower($email);

        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $baseUrl = config('tenancy.hostname.default');
        $hostname->fqdn = "{$subdomain}.{$baseUrl}";
        app(HostnameRepository::class)->attach($hostname, $website);

        // make hostname current
        app(Environment::class)->tenant($hostname->website);

        // Make the registered user the default Admin of the site.
        $admin = static::makeAdmin($name, $email, $password,$phone,$doc, $company);

        return new Tenant($website, $hostname, $admin);
    }

    private static function makeAdmin($name, $email, $password,$phone,$doc, $company): User
    {
        $admin = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password), 'phone' => $phone, 'doc' => $doc, 'company' => $company]);
        $admin->guard_name = 'web';
        $admin->assignRole('Super Admin');

        return $admin;
    }

    public static function tenantExists($subdomain)
    {
        $subdomain = $subdomain . '.' . config('tenancy.hostname.default');
        return Hostname::where('fqdn', $subdomain)->exists();
    }
}