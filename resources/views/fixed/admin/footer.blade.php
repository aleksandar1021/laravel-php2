<div class="clearfix"> </div>
</div>

<script src="admin/js/jquery.nicescroll.js"></script>
<script src="admin/js/scripts.js"></script>
<script>
    function deleteItem(route, id, button){
        let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            let row = button.closest('tr')
            $.ajax({
                url: route+"/"+id,
                method: "DELETE",
                data : {_token: csrfToken},
                success : function(data){
                    row.remove()
                    if(data == "redirect"){
                        window.location.href = '/reservationsAdmin';
                    }
                },error: function(){

                }
            })
    }
</script>
@yield("scripts")
