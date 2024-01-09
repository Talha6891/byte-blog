<footer class="footer mt-auto">
    <div class="copyright bg-white">
      <p>
        &copy; <span id="copy-year"></span> Copyright by
          <a class="text-primary" href="https://github.com/Talha6891/byte-blog" target="_blank" >{{ __('Talha') }}</a>.
      </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
  </footer>
