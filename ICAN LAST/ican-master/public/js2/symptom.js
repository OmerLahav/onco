$(document).ready(function () {
    //next prev 
    var position = 1;
    $("#next").click(function () {
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

    $("#back").click(function () {
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

    //-----JS for report symptom one-------------


    $(".symp-one").click(function () {
                $(".section-symp-2,.section-symp-3").hide();
        $(".section-symp-1").show();
    });

    //check if user chaked level
    $('#save-symp-one').click(function () {
        if (!$("input[name='symptom-1']:checked").val()) {
            alert('Please select level');
        } else {
            $(".symp-one").css("background", "#d6f5d6");
            $("#checked-symp-one").show();
        }

    });

    //radio color on click


     $("#radio-zero-symp-1").click(function () {
        $("#il-info-symp-one-0").css("color", "#4169E1");
        $("#il-info-symp-one-1").css("color", "black");
        $("#il-info-symp-one-2").css("color", "black");
        $("#il-info-symp-one-3").css("color", "black");
        $("#il-info-symp-one-4").css("color", "black");
    });
    $("#radio-one-symp-1").click(function () {
        $("#il-info-symp-one-0").css("color", "black");
        $("#il-info-symp-one-1").css("color", "#32CD32");
        $("#il-info-symp-one-2").css("color", "black");
        $("#il-info-symp-one-3").css("color", "black");
        $("#il-info-symp-one-4").css("color", "black");
    });
    $("#radio-two-symp-1").click(function () {
        $("#il-info-symp-one-0").css("color", "black");
        $("#il-info-symp-one-1").css("color", "black");
        $("#il-info-symp-one-2").css("color", "#ffe066");
        $("#il-info-symp-one-3").css("color", "black");
        $("#il-info-symp-one-4").css("color", "black");

    });
    $("#radio-three-symp-1").click(function () {
        $("#il-info-symp-one-0").css("color", "black");
        $("#il-info-symp-one-1").css("color", "black");
        $("#il-info-symp-one-2").css("color", "black");
        $("#il-info-symp-one-3").css("color", "#ffa500");
        $("#il-info-symp-one-4").css("color", "black");

    });
    $("#radio-four-symp-1").click(function () {
        $("#il-info-symp-one-0").css("color", "black");
        $("#il-info-symp-one-1").css("color", "black");
        $("#il-info-symp-one-2").css("color", "black");
        $("#il-info-symp-one-3").css("color", "black");
        $("#il-info-symp-one-4").css("color", "#8B4513");

    });


   //-----JS for report symptom two-------------


    $(".symp-two").click(function () {
        $(".section-symp-1,.section-symp-3").hide();
         $(".section-symp-2").show();
    });

    //check if user chaked level
    $('#save-symp-two').click(function () {
        if (!$("input[name='symptom-2']:checked").val()) {
            alert('Please select level');
        } else {
            $(".symp-two").css("background", "#d6f5d6");
            $("#checked-symp-two").show();
        }

    });

    //radio color on click


     $("#radio-zero-symp-2").click(function () {
        $("#il-info-symp-two-0").css("color", "#4169E1");
        $("#il-info-symp-two-1").css("color", "black");
        $("#il-info-symp-two-2").css("color", "black");
        $("#il-info-symp-two-3").css("color", "black");
        $("#il-info-symp-two-4").css("color", "black");
    });
    $("#radio-one-symp-2").click(function () {
        $("#il-info-symp-two-0").css("color", "black");
        $("#il-info-symp-two-1").css("color", "#32CD32");
        $("#il-info-symp-two-2").css("color", "black");
        $("#il-info-symp-two-3").css("color", "black");
        $("#il-info-symp-two-4").css("color", "black");
    });
    $("#radio-two-symp-2").click(function () {
        $("#il-info-symp-two-0").css("color", "black");
        $("#il-info-symp-two-1").css("color", "black");
        $("#il-info-symp-two-2").css("color", "#ffe066");
        $("#il-info-symp-two-3").css("color", "black");
        $("#il-info-symp-two-4").css("color", "black");

    });
    $("#radio-three-symp-2").click(function () {
        $("#il-info-symp-two-0").css("color", "black");
        $("#il-info-symp-two-1").css("color", "black");
        $("#il-info-symp-two-2").css("color", "black");
        $("#il-info-symp-two-3").css("color", "#ffa500");
        $("#il-info-symp-two-4").css("color", "black");

    });
    $("#radio-four-symp-2").click(function () {
        $("#il-info-symp-two-0").css("color", "black");
        $("#il-info-symp-two-1").css("color", "black");
        $("#il-info-symp-two-2").css("color", "black");
        $("#il-info-symp-two-3").css("color", "black");
        $("#il-info-symp-two-4").css("color", "#8B4513");

    });

//-----JS for report symptom three-------------


    $(".symp-three").click(function () {
        $(".section-symp-1,.section-symp-2").hide();
         $(".section-symp-3").show();
    });

    //check if user chaked level
    $('#save-symp-three').click(function () {
        if (!$("input[name='symptom-3']:checked").val()) {
            alert('Please select level');
        } else {
            $(".symp-three").css("background", "#d6f5d6");
            $("#checked-symp-three").show();
        }

    });

    //radio color on click


     $("#radio-zero-symp-3").click(function () {
        $("#il-info-symp-three-0").css("color", "#4169E1");
        $("#il-info-symp-three-1").css("color", "black");
        $("#il-info-symp-three-2").css("color", "black");
        $("#il-info-symp-three-3").css("color", "black");
        $("#il-info-symp-three-4").css("color", "black");
    });
    $("#radio-one-symp-3").click(function () {
        $("#il-info-symp-three-0").css("color", "black");
        $("#il-info-symp-three-1").css("color", "#32CD32");
        $("#il-info-symp-three-2").css("color", "black");
        $("#il-info-symp-three-3").css("color", "black");
        $("#il-info-symp-three-4").css("color", "black");
    });
    $("#radio-two-symp-3").click(function () {
        $("#il-info-symp-three-0").css("color", "black");
        $("#il-info-symp-three-1").css("color", "black");
        $("#il-info-symp-three-2").css("color", "#ffe066");
        $("#il-info-symp-three-3").css("color", "black");
        $("#il-info-symp-three-4").css("color", "black");

    });
    $("#radio-three-symp-3").click(function () {
        $("#il-info-symp-three-0").css("color", "black");
        $("#il-info-symp-three-1").css("color", "black");
        $("#il-info-symp-three-2").css("color", "black");
        $("#il-info-symp-three-3").css("color", "#ffa500");
        $("#il-info-symp-three-4").css("color", "black");

    });
    $("#radio-four-symp-3").click(function () {
        $("#il-info-symp-three-0").css("color", "black");
        $("#il-info-symp-three-1").css("color", "black");
        $("#il-info-symp-three-2").css("color", "black");
        $("#il-info-symp-three-3").css("color", "black");
        $("#il-info-symp-three-4").css("color", "#8B4513");

    });


   
});