(function($){
    $('#demo1').stopwatch().stopwatch('start');
         $('#demo2').stopwatch().click(function(){ 
             $(this).stopwatch('toggle');
         });
        $('#demo3').stopwatch().click(function(){ 
            $(this).stopwatch('reset');
        }).stopwatch('start');
        $('#demo4').stopwatch({startTime: 10000000}).stopwatch('start');
        $('#demo5').stopwatch({updateInterval: 2000}).stopwatch('start');
        $('#demo6').stopwatch({format: '{Minutes} and {s.}'}).stopwatch('start');
 })(jQuery);