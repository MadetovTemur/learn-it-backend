
document.querySelectorAll("a#delete_from").forEach(form =>
  form.addEventListener("click", (e) => {
    e.preventDefault();

    if(! confirm("you have delete user ")) {
      return false
    }

    $.ajax({
      url: e.target.getAttribute("href"),
      method: e.target.dataset.method,
      data: 'application/json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(result) {
        document.getElementById(result.id).remove()
      },
      error: function(request,msg,error) {
        console.log(request);
      }
    });
    // 

    console.log();
  })
)

