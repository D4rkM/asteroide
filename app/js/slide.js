$(function(){
    
    var liWidth = $("#slide ul li").outerWidth(),
        speed   = 3000,
        rotate  = setInterval(auto, speed);
    
    $(".botoes a").fadeOut();
    
    // Mostra os botões
	$("#slide").hover(function(){
		$(".botoes a").fadeIn();
        clearInterval(rotate);
	}, function(){
		$(".botoes a").fadeOut();
        rotate = setInterval(auto, speed);
	});
    
    // Próximo
    $(".next").click(function(e){
        e.preventDefault();
        
        $("#imagens4 ul").css({'width':'99999%'}).animate({left:-liWidth}, function(){
            $("#imagens4 ul li").last().after($("#imagens4 ul li").first());
            $(this).css({'left':'0', 'width':'auto'});
        });
    })
    
    // Anterior
    $(".prev").click(function(e){
        e.preventDefault();
        
        $("#imagens4 ul li").first().before($("#imagens4 ul li").last().css({'margin-left':-liWidth}));
        $("#imagens4 ul").css({'width':'99999%'}).animate({left:liWidth}, function(){
            $("#imagens4 ul li").first().css({'margin-left':'0'});
            $(this).css({'left':'0', 'width':'auto'});
        });
    })
    
    function auto(){
        $(".next").click();
    }
});