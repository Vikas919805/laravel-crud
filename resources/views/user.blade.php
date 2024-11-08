<div>
    <center>
    <h1>Upload file</h1>
    
    <form action="/user"method="POST"enctype="multipart/form-data">
       @csrf
       <input type="file" name="file" id="">
        <button type="submit">Upload file</button>
</form>
</center>

 </div>
