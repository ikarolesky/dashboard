let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
let elems1 = Array.prototype.slice.call(document.querySelectorAll('.js-switch1'));
let elems2 = Array.prototype.slice.call(document.querySelectorAll('.js-switch2'));
let elems3 = Array.prototype.slice.call(document.querySelectorAll('.js-switch3'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
elems1.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
elems2.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
elems3.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
