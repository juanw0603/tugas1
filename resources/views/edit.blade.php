 @extends('layout')

 
@section('content')
<form id="edit-promotion" class="w-full max-w-sm shadow-xl" enctype="multipart/form-data">
    @csrf
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-Title">
          Title
        </label>
      </div>
      <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="title" name="title" type="text" value="{{ old('title', $promotion->title ?? '') }}" required>
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-description">
          Description
        </label>
      </div>
      <div class="md:w-2/3">
        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full h-32 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 resize-none break-words" 
        id="description" 
        name="description" 
        placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit" 
        required>{{ $promotion->description }}</textarea>
      </div>
    </div>

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-image">
            images
          </label>
        </div>
        <div class="md:w-2/3">
            <img src="{{ asset('images/' . $promotion->image) }}" alt="Current Image" class="rounded w-full h-[150px] object-cover">
        </div>
      </div>


    
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
           aria-describedby="file_input_help" 
           id="file_input" 
           type="file" 
           name="image" 
           accept="image/*">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, or GIF (MAX. 800x400px).</p>
    
       
    <div class="flex justify-end pt-6 space-x-2">
      <button type="button" onclick="window.location.href='{{ route('home') }}'" class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">Cancel</button>
      <button id="delete-promotion" type="button" class="bg-[#f80101] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#7b4545] active:scale-95 transition-transform transform">Delete</button>      
    <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform" type="submit">EDIT promotion</button>
    </div>  
  </form>
@endsection
  
@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      $('#edit-promotion').submit(function (e) {
        e.preventDefault();

        let promotion = @json($promotion);
        let formData = new FormData(this);

        formData.append('promotion_id', JSON.stringify(promotion['id']));

        // If no new image is selected, keep the old image
        let fileInput = document.getElementById('file_input');
        if (!fileInput.files.length) {
            formData.append('keep_old_image', true); // Flag for backend
        }

        $.ajax({
            url: "{{ route('promotion.edit') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                }).then(() => {
                    window.location.href = "{{ route('home') }}";
                });

                // Clear form
                $('#edit-promotion')[0].reset();
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Something went wrong. Please try again.',
                });
            }
        });
    });

      $('#delete-promotion').click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, destroy it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('promotion.destroy', $promotion->id) }}", // Pass ID in URL
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}" // Required for DELETE
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Destroyed!',
                        text: response.message,
                    }).then(() => {
                        window.location.href = "{{ route('home') }}"; // Redirect
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Failed to destroy. Please try again.',
                    });
                }
            });
        }
    });
});

    });
  </script>
@endsection
