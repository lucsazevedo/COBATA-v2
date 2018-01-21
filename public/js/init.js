$(document).ready(function(){
	$(".button-collapse").sideNav();
	$(".slider").slider({full_width: true});
	$('select').material_select();
	$(".dropdown-button").dropdown();  
    $('.marcas').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000 
      });
    $('.carousel.carousel-slider').carousel({fullWidth: true});
            
});

function sliderPrev(){
	$('.slider').slider('pause');
	$('.slider').slider('prev');
}


function sliderNext(){
	$('.slider').slider('pause');
	$('.slider').slider('next');
}

function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

 $('#carrinho').submit(function( event ) {
    event.preventDefault();
    $.ajax({
        url: '/carrinho/adicionar',
        type: 'post',
        data: $('form').serialize(), // Remember that you need to have your csrf token included
        dataType: 'json',
        success: function( _response ){
           alert('Produto Adicionado com Sucesso!');
        },
        error: function( _response ){
            alert('Erro!');
        }
    });
});

$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:false,
        navigationText:["",""],
        slideSpeed:1000,
        singleItem:true,
        autoPlay:true
    });
});