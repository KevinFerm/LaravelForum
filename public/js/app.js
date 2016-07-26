(function() {
  var loadCats;

  loadCats = function() {
    return $.get('/forum/getcats', function(data) {
      $('.categories_show').empty();
      $('.categories_show').append(data);
      return console.log("Appended data");
    });
  };

  $(function() {
    $("#summernote").summernote({
      height: 300,
      width: 500
    });
    if ('.categories_show') {
      loadCats();
    }
    $(document).on("click", ".cat_del", function(event) {
      $.ajax('/forum/deleteforum', {
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {
          forum_id: event.target.id.split("_")[2]
        },
        error: function(jqXHR, textStatus, errorThrown) {
          return console.log(textStatus);
        },
        success: function(data, textStatus, jqXHR) {
          return loadCats();
        }
      });
      return console.log(event.target.id.split("_")[2]);
    });
    $(document).on("click", '.forum_del', function(event) {
      $.ajax('/forum/deleteforum', {
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {
          forum_id: event.target.id.split("_")[2]
        },
        error: function(jqXHR, textStatus, errorThrown) {
          return console.log(textStatus);
        },
        success: function(data, textStatus, jqXHR) {
          return loadCats();
        }
      });
      return console.log(event.target.id.split("_")[2]);
    });
    return $(document).on("change", '.change_cat', function(event) {
      $.ajax('/forum/changecat', {
        type: 'PATCH',
        headers: {
          'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {
          forum_id: event.target.id.split("_")[2],
          cat_id: event.target.value
        },
        error: function(jqXHR, textStatus, errorThrown) {},
        success: function(data, textStatus, jqXHR) {
          return loadCats();
        }
      });
      return console.log(event.target.value);
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map
