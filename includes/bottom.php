<script>
  $('document').ready(() => {
    $('.user_btn').tooltip('toggle');
    $('.admin_btn').tooltip('toggle');

    $('.user_btn').on('click', () => {
      $('.user').removeClass('d-none');
      $('.admin').addClass('d-none');
    });

    $('.admin_btn').on('click', () => {
      $('.admin').removeClass('d-none');
      $('.user').addClass('d-none');
    });
  });
</script>
</body>

</html>