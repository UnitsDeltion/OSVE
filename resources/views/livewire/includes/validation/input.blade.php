<div>
    @error($input) 
        <script>
            document.getElementById('{{$input}}').classList.add("bc-red", "sh-red"); 
            document.getElementById('{{$input}}').classList.remove("shadow-sm"); 
        </script>
    @enderror
</div>
