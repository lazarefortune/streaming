@extends('layouts.template')

@section('extra-css-streaming')
<style>
  #imageUploadInput {
    display: none;
  }
  .image{
    max-width: 300px;
    height: auto;
    margin-bottom: 32px;
    box-shadow: 0px 2px 3px rgba(0,0,0,0.4);
  }
  .image-name{
    margin: 16px 0;
    text-align: center;
    display: none;
  }
  .loading-wrapper{
    min-width: 30%;
    position: relative;
    display: none;
  }
  .loading-bar{
    width: 20%;
    height: 20px;
    background: #4d5563;
    border-radius: 10px;
    position: absolute;
    top: 0;
    left: 0;
  }
  .loading-bar-bg{
    width: 100%;
    height: 20px;
    background: #2B303A;
    border-radius: 10px;
  }
  .loading-number{
    margin-top: 16px;
    text-align: center;
  }
  .button{
    color: white;
    border: 0;
    border-radius: 0.5rem;
    padding: 12px 20px;
    box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.4);
    font-size: 14px;
    font-weight: 400;
    position: relative;
    transition: 2s ease-in-out;
    outline: none;
  }
  .button:hover{
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.6);
    cursor: pointer;
  }
  .choose-image-button{
    background: #2B303A;
    margin-right: 8px;
  }
  .upload-button{
    background: #FF4000;
  }

</style>

@endsection

@section('contenu')

<img class="image"/>

<!-- form -->

<form class="form">
  <div >
    <label for="imageUploadInput" class="button choose-image-button">
      choose image
      <input type="file"  id="imageUploadInput">
    </label>
    <button type="submit" class="button upload-button">upload</button>
  </div>
  <p class="image-name">Image name</p>
</form>

<!-- loading bar -->

<div class="loading-wrapper">
  <div class="loading-bar-bg">
  </div>
  <div class="loading-bar">
  </div>
  <p class="loading-number">20%</p>
</div>

<!-- axios and custom js -->

<script class="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="css-image.js"></script>
<script>

  const form = document.querySelector('.form');
  const input = document.querySelector('#imageUploadInput');

  const imageName = document.querySelector('.image-name');
  const image = document.querySelector('.image');

  const loadingWrapper = document.querySelector('.loading-wrapper');
  const loadingBar = document.querySelector('.loading-bar');
  const loadingNumber = document.querySelector('.loading-number');

  // show image name after choosing one

  let imageData;
  input.addEventListener('change', e => {
    if (e.target.files.length) {
      imageData = e.target.files[0];
      imageName.style.display = 'block';
      imageName.innerText = imageData.name;
    }
  });

  // form submit

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    // Link
    const api_link = '...';
    // Data
    const formData = new FormData();
    formData.append('image', imageData);
    // Config
    const config = {
      // Show Loading Bar while uploading
      onUploadProgress: progressEvent => {
        const { loaded, total } = progressEvent;
        const persentege = Math.round((loaded * 100) / total);
        loadingWrapper.style.display = "block";
        loadingBar.style.width = persentege + '%';
        loadingNumber.innerText = persentege + '%'
      },
      // telling the server what type of content we send
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    }
    // Request
    axios.patch(api_link, formData, config).then(res => {
      // show image after uploading
      image.style.display = 'block';
      image.setAttribute('src', res.data.user.newAvatar);
      // Hide progress bar after uploading
      loadingWrapper.style.display = 'none';
    });
  });
</script>

@endsection
