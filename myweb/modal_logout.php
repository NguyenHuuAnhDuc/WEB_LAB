<div id="id04" class="modal">
	<form class="modal-content animate">
		<div class="imgcontainer">
         <span onclick="document.getElementById('id04').style.display='none'" class="close" 
         title="Close Modal">&times;</span>
		</div>
      <div class="container">
         <h4>Are you sure you want to logout?</h4>
         <div class="clearfix">
            <a class="w3-button w3-red" href='logout.php'>Yes</a>
            <a class="w3-button w3-blue" onclick="document.getElementById('id04').style.display='none'">No</a>
         </div>   
      </div>
   </form>
</div>  
<script>
// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('id04');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>