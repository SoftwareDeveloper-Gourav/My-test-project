$('#app').validate({
   rules:{
    product:'required',
    price:'required',
    file:'required'
   },messages:{

   },submitHandler:function(form,event){
    event.preventDefault();
    $('#btn').val('Please Wait..');
    $('#btn').attr('disabled',true);
   $.ajax({
        url:'form',
        method:'POST',
        data:new FormData(form),
        enctype:'multipart/form-data',
        dataType:'json',
        contentType:false,
        processData:false,
        success:function(data){
            $('#btn').val('Upload');
            $('#btn').attr('disabled',false);
            console.log(data);
            swal({
                title:data.title,
                icon:data.icon
            });
            $('#app').trigger('reset');
        }
        });

}
});