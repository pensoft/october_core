$(document).render(function() {
    (function initImageCropperTriger(){
        $('[data-control="fileupload"]:not([cropper-initialized])').each(function(e){

            var $field = $(this),
                isFU = $field.data('control') == 'fileupload',
                $img = $field.find('img')

            /*
             *  Handle file upload
             */

            if(isFU){

                var lock = false,
                    count = $img.length

                $field.off('DOMSubtreeModified').on('DOMSubtreeModified', function(){
                    if(!lock){
                        lock = true

                        setTimeout(function(){
                            var $img = $field.find('img')

                            if(!$img.length || count != $img.length){
                                $field.removeAttr('cropper-initialized')
                            }

                            initImageCropperTriger()

                            lock = false
                        }, 500)
                    }

                })
            }

            if(!$img.length){
                return;
            }

            $img.not('[cropper-initialized]').each(function(i){

                var $el = $(this)

                var $imgContainer = $el.parent(),
                    $trigger = $('<a class="image-cropper-trigger" href="javascript:;"></a>'),
                    getValue = function() {
                        var value = null

                        /*
                         *  Handle file upload
                         */
                        if(isFU){
                            value = $el.closest('.upload-object').find('.upload-remove-button').data('request-data')

                            value = typeof value == 'string' ? parseInt(value.replace('file_id: ', '')) : value.file_id

                        }else{
                            value = $field.find('[data-find-value]').prop('value')
                        }

                        return value
                    }


                $trigger.on('click', function(e){
                    e.stopPropagation()

                    var value = getValue()

                    $trigger.popup({ handler: 'ImageCropper::onLoadPopup',size:"huge", extraData: { type: isFU ? 'upload' : 'media', path: value, error: !value | 0 } })

                })

                $imgContainer[0].appendChild($trigger[0])

                $el.attr('cropper-initialized', true)

            })

            $field.attr('cropper-initialized', true)

        });
    })()
});


var cropper = '';
var image = ''
var form = '';
function initImageCropperPicker(){
    image = $('#img-responsive');
    form = image.closest('form');
    data = form.data('request-data');
    if(data){
        data = {x: Math.round(data.x), y: Math.round(data.y), width: Math.round(data.width), height: Math.round(data.height), rotate: Math.round(data.rotate), scaleX: Math.round(data.scaleX), scaleY: Math.round(data.scaleY)};
    }
    console.log(data);
    image.cropper({
      movable:false,
      zoomable:false,
      zoomOnTouch:false,
      zoomOnWheel:false,
      data:data,
      crop:function(event){
        $('#show_width').val(Math.round(event.detail.width));
        $('#show_height').val(Math.round(event.detail.height));
      },
    });
    cropper = image.data('cropper');
}

$(document).on('click','#onUpdate',function(){
    co_ordinates = cropper.getData();
    form.data('request-data',{data:co_ordinates});
    form.submit();
});

$(document).on('click','#onClear',function(){
    co_ordinates = '';
    form.data('request-data',{data:co_ordinates});
    form.submit();
});

$(document).on('blur input change','#show_width',function(){
    co_ordinates = cropper.getData();
    co_ordinates.width = Math.round($(this).val());
    cropper.setData(co_ordinates);
    console.log(co_ordinates);
});

$(document).on('blur input change','#show_height',function(){
    co_ordinates = cropper.getData();
    co_ordinates.height = Math.round($(this).val());
    cropper.setData(co_ordinates);
    console.log(co_ordinates);
});

