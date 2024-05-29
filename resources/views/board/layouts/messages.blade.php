@if (Session::has('success'))
<script>
  $(function() {
    $.toast({
      heading: 'رسال تاكيد',
      text: '{{ Session::get('success') }}',
      hideAfter: 5000 , 
      icon: 'success'  , 
      position: 'top-right',
      textAlign: 'right' , 
      allowToastClose: false , 
    })
  });
</script>
@endif


@if (Session::has('error'))
<script>
  $(function() {
    $.toast({
      heading: 'رسال تحذير',
      text: '{{ Session::get('error') }}',
      hideAfter: 5000 , 
      icon: 'error'  , 
      position: 'top-right',
      textAlign: 'right' , 
      allowToastClose: false , 
    })
  });
</script>
@endif