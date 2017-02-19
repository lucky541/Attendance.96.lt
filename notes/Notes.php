<?php
 function NotesInput(){
 	echo "<hr class='my-2'>  
                    <h3 class='h3-responsive'>Note:</h3>
                    <!-- input for to do-->
                    <div class='md-form'>
                    <br/>
                    <input type='text' id='myNewNote' class='form-control' placeholder='Note it' >
                    </div>
                    <button onclick='AddNotes()' type='button' class='btn btn-md btn-info waves-effect'>Note</button>

                    </div>
                    <!-- to to list -->
                  
                    <div class='h4-responsive'>Notes:</div>
                    
                    <ul id='myUL' class='hoverable' style='overflow-y: scroll; max-height: 250px;'>
                    </ul>";
   }
?>