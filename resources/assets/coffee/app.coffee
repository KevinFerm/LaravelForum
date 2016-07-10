$ ->
  console.log("Dom Ready")
  $(".cat_del").on "click", (event) ->
    $.ajax '/forum/deleteforum',
      type: 'DELETE'
      headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()}
      data: {forum_id: event.target.id.split("_")[2] }
      error: (jqXHR, textStatus, errorThrown) ->
        console.log(textStatus)
      success: (data, textStatus, jqXHR) ->
        $('body').append "Deleted"
    console.log(event.target.id.split("_")[2])

  $('.forum_del').on "click", (event) ->
    $.ajax '/forum/deleteforum',
      type: 'DELETE'
      headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()}
      data: {forum_id: event.target.id.split("_")[2] }
      error: (jqXHR, textStatus, errorThrown) ->
        console.log(textStatus)
      success: (data, textStatus, jqXHR) ->
        $('body').append "Deleted"
    console.log(event.target.id.split("_")[2])
