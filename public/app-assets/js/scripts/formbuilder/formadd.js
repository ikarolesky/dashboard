$(document).ready(function(){
    $('.js-switch').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          $("#new-form").append('<label for="nome">Nome</label><br><input id="nome" type="text" name="nome" class="form-group"><br>');
          $("#new-form").append(`<input type="hidden" name="conteudo1" id="conteudo1" value="<label for='nome'>Nome</label><br><input id='nome' type='text' name='nome' class='form-group col-md-4' required>"<br>`);
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });
    $('.js-switch1').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          $("#new-form").append('<label for="email">Email</label><br><input id="email" type="email" name="email" class="form-group"><br>');
          $("#new-form").append(`<input type="hidden" name="conteudo2" id="conteudo2" value="<label for='email'>Email</label><br><input id='email' type='email' name='email' class='form-group col-md-4'>"<br>`);
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });
    $('.js-switch2').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          $("#new-form").append('<label for="telefone">Telefone</label><br><input id="telefone" type="telefone" name="telefone" class="form-group"><br>');
          $("#new-form").append(`<input type="hidden" name="conteudo3" id="conteudo3" value="<label for='telefone'>Telefone</label><br><input id='telefone' type='telefone' name='telefone' class='form-group cel-sp-mask col-md-4' required>"<br>`);
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });

    $('.js-switch3').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          let opt1 = window.prompt('Digite o texto desejado para a primeira opção!');
          let opt2 = window.prompt('Digite o texto desejado para a segunda opção!');
          let opt3 = window.prompt('Digite o texto desejado para a terceira opção!');
          $("#new-form").append('<label for="select">Selecione</label><br><select id="selecione" name="selecione" class="custom-select"><option value="'+ opt1 +'">' + opt1 +'</option><option value="'+ opt2 +'">' + opt2 +'</option><option value="'+ opt3 +'">' + opt3 +'</option></select>');
          $("#new-form").append(`<input type="hidden" name="conteudo4" id="conteudo4" value="<label for='select'>Selecione</label><br><select id='selecione' name='selecione' class='custom-select col-md-4'><option value='${opt1}'>${opt1}</option><option value='${opt2}'>${opt2}</option><option value='${opt3}'>${opt3}</option></select>"<br>`);
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });

});