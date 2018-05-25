$(document).ready(function () {
    //next prev 
    $(document).on('click', '#next', function(){ 
        if($(this).attr('page') != "")
        {
            $(".page").hide();
            $("."+$(this).attr('page')).show();


            $(".symp_level").hide();
            //$("."+$(this).attr('treatmentsymtomsid')).show();
        }
    });

    $(document).on('click', '#back', function(){ 
        if($(this).attr('page') != "")
        {
            $(".page").hide();
            $("."+$(this).attr('page')).show();
            

            $(".symp_level").hide();
            //$("."+$(this).attr('treatmentsymtomsid')).show();
        }
    });

    //Navigantion Bar Code

    $(document).on('click', '.nav-item', function(){  
        if($(this).attr('treatmentid') != "")
        {
            $(".page").hide();
            $("."+$(this).attr('treatmentid')+'_first_list').show();
            
            $(".symp_level").hide();
            //$("."+$(this).attr('treatmentsymtomsid')).show();
        }
    });



    //-----JS for report symptom one-------------

    $(".symps").click(function () {        
        $(".symp_level").hide();
        $("."+$(this).attr('symp_treatid')).show();
    });

    //check if user chaked level
    $('.save_level_symtoms').click(function () {
        if (!$("input[class='symptom_level']:checked").val()) {
            alert('Please select level');
            return false;
        } else {
           $("#"+$(this).attr('frm_id')).submit();
        }

    });

    //radio color on click


     $(".level_radio_0").click(function () {
        $("#checkmark_"+$(this).attr('lblatt')+"_0").css("background-color",$(this).attr('color_attr'));
        $("#checkmark_"+$(this).attr('lblatt')+"_1").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_2").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_3").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_4").css("background-color","#eee");


        $("#level_text_"+$(this).attr('lblatt')).val($(this).attr('description_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-0").css("color",$(this).attr('color_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-1").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-2").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-3").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-4").css("color", "black");
    });
    $(".level_radio_1").click(function () {
        $("#checkmark_"+$(this).attr('lblatt')+"_1").css("background-color",$(this).attr('color_attr'));

        $("#checkmark_"+$(this).attr('lblatt')+"_0").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_2").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_3").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_4").css("background-color","#eee");

        $("#level_text_"+$(this).attr('lblatt')).val($(this).attr('description_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-0").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-1").css("color", $(this).attr('color_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-2").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-3").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-4").css("color", "black");
    });
    $(".level_radio_2").click(function () {
        $("#checkmark_"+$(this).attr('lblatt')+"_2").css("background-color",$(this).attr('color_attr'));

        $("#checkmark_"+$(this).attr('lblatt')+"_1").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_0").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_3").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_4").css("background-color","#eee");


        $("#level_text_"+$(this).attr('lblatt')).val($(this).attr('description_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-0").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-1").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-2").css("color", $(this).attr('color_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-3").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-4").css("color", "black");

    });
    $(".level_radio_3").click(function () {

        $("#checkmark_"+$(this).attr('lblatt')+"_3").css("background-color",$(this).attr('color_attr'));

        $("#checkmark_"+$(this).attr('lblatt')+"_1").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_0").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_2").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_4").css("background-color","#eee");


        $("#level_text_"+$(this).attr('lblatt')).val($(this).attr('description_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-0").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-1").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-2").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-3").css("color", $(this).attr('color_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-4").css("color", "black");

    });
    $(".level_radio_4").click(function () {

        $("#checkmark_"+$(this).attr('lblatt')+"_4").css("background-color",$(this).attr('color_attr'));

        $("#checkmark_"+$(this).attr('lblatt')+"_1").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_0").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_2").css("background-color","#eee");
        $("#checkmark_"+$(this).attr('lblatt')+"_3").css("background-color","#eee");


        $("#level_text_"+$(this).attr('lblatt')).val($(this).attr('description_attr'));
        $("#il-info-"+$(this).attr('lblatt')+"-0").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-1").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-2").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-3").css("color", "black");
        $("#il-info-"+$(this).attr('lblatt')+"-4").css("color", $(this).attr('color_attr'));
    });



});