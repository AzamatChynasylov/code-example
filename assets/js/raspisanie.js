// $(document).ready(function(){
//     var kol_sp=0;
//     var n_gr=0;
//     var n_t=0;
//     for (var j = 1;j < 11; j++) 
//     {
        
    
//         for (var i = 0; i <6; i++) 
//         {
//            $.each($('#p'+j+i+' p'), function() {
//                kol_sp++;
//             });
//            //alert(kol_sp);
//            if(kol_sp>0)
//            {
//                 for (var i1 = 0; i1 < kol_sp; i1++) 
//                 {
//                    $("#p"+j+i+" p:nth-child("+(i1+1)+") input").val();
//                    n_gr=$("#p"+j+i+" p:nth-child("+(i1+1)+")").attr('class');
//                    n_t=$("#p"+j+i+" p:nth-child("+(i1+1)+") span").attr('class');
//                    //alert($("#p1"+i+" p:nth-child("+(i1+1)+")").attr('class'));
//                    $("#g"+j+i+" option:nth-child("+(parseInt(n_gr)+1)+")").hide();
//                    $("#t"+j+i+" option:nth-child("+(parseInt(n_t)+1)+")").hide();
//                 };
//            }
//            n_gr=0;
//            n_t=0;
//            kol_sp=0;
//         };
//     };
// });
// $(document).ready(function(){
// var kol_p=0;
// var id_b=0;

// $("img").on("click", function(){
//      //alert('ok');
    
//     var id=$(this).attr("id");
//     id_b=id;
//     var gruppa= $('#g'+id).val();
//     var teacher= $('#t'+id).val();
//     var kol_p1=0;
//     var kol_vnutri_div=0;
//     if(gruppa=='' || teacher=='')
//     {
//         return false;
//     }
//     else
//     {
//         kol_p++;
        
//         var indexoption =$("#t"+id+" option:selected").index();
//         var indexoption_g =$("#g"+id+" option:selected").index();
//         //alert(indexoption_g);
//          $.each($('#p'+id+' p'), function() {
//            kol_p1++
//         });
        

//         //$( '#p'+id ).append("<p  id="+kol_p+" class="+indexoption_g+" name='"+'p'+id+kol_p+"'><i id="+kol_p1+"></i><input class='dobavok' type='text' value='"+gruppa+"'><b>"+teacher+"</b><span id="+kol_p+" class="+indexoption+">X</span></p>");
       
//         $("#t"+id+" :selected").hide();
//         $("#g"+id+" :selected").hide();
//         $("select#t"+id).prop('selectedIndex',0);
//          $('select#g'+id).prop('selectedIndex',0);

//       $.each($('#p'+id+' p'), function() {
//            kol_vnutri_div++;
//         });
//      // alert(kol_vnutri_div);
      
//         $( '#p'+id ).append("<p class="+indexoption_g+" name='"+'p'+id+(kol_vnutri_div)+"'><input class='dobavok' type='text' value='"+gruppa+"'><b>"+teacher+"</b><span id='"+id+"'  class="+indexoption+" name="+'p'+id+kol_vnutri_div+">X</span></p>");
      
      
//     }
//      return false;
  
// });
// $('body').on("click",'span',function(){
//    var id=$(this).attr("id");
//    var name=$(this).attr("name");
//    var class_nomer=$(this).attr("class");
//     var p_classnomer=$('p[name ='+name+' ]').attr("class");
//     //alert('aza');
//     class_nomer=parseInt(class_nomer)+1;
//    p_classnomer=parseInt(p_classnomer)+1;
//     //$("#t"+id+" option:nth-child("+class_nomer+")").show();
//    //$("#g"+id+" option:nth-child("+p_classnomer+")").show();
//    //$('p[name ='+name+' ]').remove();
//    /*
//         var class_nomer=$(this).attr("class");
//    var p_classnomer=$("p#"+id).attr("class");
//    class_nomer=parseInt(class_nomer)+1;
//    p_classnomer=parseInt(p_classnomer)+1;
   
//    $("#t"+id_b+" option:nth-child("+class_nomer+")").show();
//    $("#g"+id_b+" option:nth-child("+p_classnomer+")").show();
//    */
//   //alert('a');
//    //alert(p_classnomer);
//    //$("p#"+id).remove(); 
   
  
// });

// $('#raspisanie_send').submit(function(){
//     var name_group='';
//     var name_teacher='';
//     var kol_pp=0;
//     var i2=2;
//     var val_input='';
//     var val_b='';
//     var index_g='';
//     var index_t='';
//     var all_info='';
//     var all_info_array=new Array();
//     for (var j = 1; j < 11; j++) 
//     {
//             for (var i = 0; i < 6; i++) 
//         {
//             kol_pp=0;

//             $.each($('#p'+j+i+' p'), function() {
//                kol_pp++
//             });
//             //alert(kol_pp);
//             if(kol_pp>0)
//             {
//                 for (var i1 = 0; i1 < kol_pp; i1++) 
//                 {
//                     i2=i2+i1;
//                     val_input=$("#p"+j+i+" p:nth-child("+(i2-1)+") input").val();
//                     val_b=$("#p"+j+i+" p:nth-child("+(i2-1)+") b").text();
//                     index_t=$("#p"+j+i+" p:nth-child("+(i2-1)+") span").attr("class");
//                     index_g=$("#p"+j+i+" p:nth-child("+(i2-1)+")").attr("class");
//                     //alert(index_t+index_g);
//                    //alert(val_b);
//                     $( '#p'+j+i).append("<input type='hidden' name='p"+j+i+i1+"' value='"+val_input+"|"+val_b+"|"+index_t+"|"+index_g+"'/> ");
                    
//                     i2=2;
//                     val_input='';
//                     val_b='';
//                     index_g='';
//                     index_t='';
//                 };
//             }
//             //alert(kol_pp);
//         };
//     };
    
//     //alert("aza");
//     // return false;

// });
// $('body').on("click","i",function(){
//     var id_i=$(this).attr("id");
//     //alert(id_i);
//     $('div#div'+id_i).removeClass("hidden");
//    $(this).remove();
   
// });
// $('b').click(function(){
//     var id_i=$(this).attr("id");
//     //alert(id_i);
//     $('div#div'+id_i).addClass("hidden");
//     $('#i'+id_i).append("<i id="+id_i+" class='btn btn-info bt_i'>+</i>");
//     //alert($('i #'+id_i).text());
// });

// });//end document
