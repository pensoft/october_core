> In OctoberCMS backend, There is a way available to crop Media images via MediaManager Widget but the problem came-up when backend admin wants to crop other Normal/Gallery images (attachOne/attachMany).

> Thanks to the Image Cropper plugin. This problem is solved now.

> This plugin provides an Image Cropper Tool in Backend for Normal/Gallery images (attachOne/attachMany).

&nbsp;
## How to install
- Go to [Image Cropper Plugin](https://octobercms.com/plugin/zakir-imagecropper) and add it to your project.
- Or You can go to **Backend > Settings** and then go to install the plugin page and type **Zakir.ImageCropper** and install it.

## How to configure
- After installation, go to **Backend > Settings** and type **Image Crop** and click on **IMAGE CROPPER link** and then **Enable Image Cropper**.

## How to crop an image.
- Now go to any image upload field and upload the image.
- After uploading you will see a crop icon on the bottom/left on that image.
- Click on that icon, it will open image in a pop-up, crop the image here and save it.
- You can also customize the width/height for cropping via input fields.
- You can see screenshots for all these steps.

## How to call crop image on front-end.
- Suppose your image upload field name is **player** So in OctoberCMS, you normaly use below code for showing it.
```    
<img src="{{ model.player.path }}">
```

- Now to show crop image(s), use this.
```
<img src="{{ model.player|crop_image }}">
```