<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

<input type="text" id="CELULAR" name="CPF" />

<script>
  
   $(document).ready(function () { 
        var $seuCampoCpf = $("#CELULAR");
        $seuCampoCpf.mask('(00) 0000-0000', {reverse: true});
    });
</script>