
        $(document).ready(function() {
            var position = 1;
            $("#next").click(function() {
                if (position == 1) {
                    $("#page-one").hide();
                    $("#page-two").show();
                    position++;
                } else if (position == 2) {
                    $("#page-one").hide();
                    $("#page-two").hide();
                    $("#page-three").show();
                    position++;
                }
            });
            $("#back").click(function() {
                if (position == 1) {
                    $("#page-one").show();
                } else if (position == 2) {
                    $("#page-one").show();
                    $("#page-two").hide();
                    $("#page-three").hide();
                    position--;
                } else {
                    $("#page-one").hide();
                    $("#page-two").show();
                    $("#page-three").hide();
                    position--;
                }
            });

            $(".symp-one").click(function() {
                $(".report-levels").show();
            });


          
              $('#save-symp-one').click(function() {
    if (!$("input[name='symptom-1']:checked").val()) {
       alert('Please select level');
    }
    else {
       $(".symp-one").css("background", "#d6f5d6");
        $("#checked-symp-one").show();
    }

});
            
            
            
            
            
             $(".radio-zero").click(function() {
                $("#il-info-zero").css("color", "#4169E1");
                $("#il-info-one").css("color", "black");
                $("#il-info-two").css("color", "black");
                $("#il-info-three").css("color", "black");
                $("#il-info-four").css("color", "black");
                $("#il-info-five").css("color", "black");
            });
            $(".radio-one").click(function() {
               $("#il-info-zero").css("color", "black");
                $("#il-info-one").css("color", "#32CD32");
                $("#il-info-two").css("color", "black");
                $("#il-info-three").css("color", "black");
                $("#il-info-four").css("color", "black");
                $("#il-info-five").css("color", "black");
            });
            $(".radio-two").click(function() {
               $("#il-info-zero").css("color", "black");
                $("#il-info-one").css("color", "black");
                $("#il-info-two").css("color", "#ffe066");
                $("#il-info-three").css("color", "black");
                $("#il-info-four").css("color", "black");
                $("#il-info-five").css("color", "black");
            });
            $(".radio-three").click(function() {
               $("#il-info-zero").css("color", "#black");
                $("#il-info-one").css("color", "black");
                $("#il-info-two").css("color", "black");
                $("#il-info-three").css("color", "#ffa500");
                $("#il-info-four").css("color", "black");
                $("#il-info-five").css("color", "black");
            });
            $(".radio-four").click(function() {
               $("#il-info-zero").css("color", "black");
                $("#il-info-one").css("color", "black");
                $("#il-info-two").css("color", "black");
                $("#il-info-three").css("color", "black");
                $("#il-info-four").css("color", "#8B4513");
                $("#il-info-five").css("color", "black");
            });
            $(".radio-five").click(function() {
              $("#il-info-zero").css("color", "black");
                $("#il-info-one").css("color", "black");
                $("#il-info-two").css("color", "black");
                $("#il-info-three").css("color", "black");
                $("#il-info-four").css("color", "black");
                $("#il-info-five").css("color", "#ff0000");
            });




        });
 