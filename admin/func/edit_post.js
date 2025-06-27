<script> 
                            //    $("#editForm").click(function(event){event.preventDefault();})
                            $(document).ready(function() {
                               $(".addbtn").click(function(event){
                                //    $("#editForm").submit(function(event){
                                   event.preventDefault();
                        
                                   let name = $("#name").val();
                                   let priv = $("#priv option:selected").val();
                                   let gend = $("#gend option:selected").val();
                                   let id = $("#id_td").val();
                                   
                                      
                                   $.post("func/admin_do_add.php" ,{
                                       name: name,
                                       gender: gend,
                                       privilage: priv  
                                   }, function(data){
                                          //  console.log("HELLO");
                                          //  console.log(data);
                                          // console.log(JSON.parse(data))
                                          $("tbody").append(data);
                                      // $("#id_td").append(data);
                                      // $("tbody").closest("tr").find("#name_td").text(name);
                                      // $("tbody").closest("tr").find("#priv_td").text(priv);
                                      // $("tbody").closest("tr").find("#gend_td").text(gend);
                        
                                   });
                                 $("#close1").trigger("click");
                                   
                               })

                            

                               $(".editbtn1").click(function(e1){
                                
                                e1.preventDefault();

                                let id1 = $("#i").val();
                                let namesel = "#name1_" + id1;

                                let name1 = $(namesel).val();

                                let privsel = "#priv1_" + id1 + " option:selected";
                                let priv1 = $(privsel).val();

                                let gendsel = "#gend1_" + id1 + " option:selected";
                                let gend1 = $(gendsel).val();

                                $.post("func/admin_do_edit.php" ,{

                                    user: name1,
                                    gend: gend1,
                                    privil: priv1,  
                                    id: id1

                                }, function(dat){
                                        console.log(dat);
                                       // console.log(JSON.parse(data))
                                   // $("#id_td").append(data);
                                   // $("tbody").closest("tr").find("#name_td").text(name);
                                   // $("tbody").closest("tr").find("#priv_td").text(priv);
                                   // $("tbody").closest("tr").find("#gend_td").text(gend);
                     
                                });
                              $("#close").trigger("click");
                                
                            });
                            });
                          
                          </script>