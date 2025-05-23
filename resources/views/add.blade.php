<!DOCTYPE html>
<html lang="en">
@include('include.head')
<body class="flex justify-center items-center min-h-screen">
  <form id="add-promotion" class="w-full max-w-sm" enctype="multipart/form-data">
    @csrf
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-Title">
          Title
        </label>
      </div>
      <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="title" name="title" type="text" placeholder="this is title" required>
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-description">
          Description
        </label>
      </div>
      <div class="md:w-2/3">
        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full h-32 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 resize-none" id="description" name="description" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit" required></textarea>
      </div>
    </div>

    
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
           aria-describedby="file_input_help" 
           id="file_input" 
           type="file" 
           name="image" 
           accept="image/*" required>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, or GIF (MAX. 800x400px).</p>
    
       
    <div class="flex justify-end pt-6 space-x-2">
      <button type="button" onclick="window.location.href='{{ route('home') }}'" class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">Cancel</button>
      <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform" type="submit">create new promotion</button>
    </div>  
  </form>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {

        $('#add-promotion').submit(function(e) {
          e.preventDefault(); 

          let formData = new FormData(this); 

          $.ajax({
              url: "{{ route('promotion.create') }}",
              method: "POST",
              data: formData,
              processData: false, // Important: Prevent jQuery from processing data
              contentType: false,
              success: function(response) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: response.message,
                  }).then(() => {
                    window.location.href = "{{ route('home') }}"; // Redirect after success
                });


                  // Clear form
                  $('#bookForm')[0].reset();
              },
              error: function(xhr) {
                  if (xhr.status === 422) {
                      let errors = xhr.responseJSON.errors;
                      let errorMessage = '';

                      $.each(errors, function(key, value) {
                          errorMessage += value[0] + '\n';
                      });

                      Swal.fire({
                          icon: 'error',
                          title: 'Validation Error!',
                          text: errorMessage,
                      });
                  } else { // jika server side error (atau request gak kekirim)
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops!',
                          text: 'Something went wrong. Please try again.',
                      });
                  }
              }
          });
      });
    });
  </script>
</body>

</html>