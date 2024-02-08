function updateImage(url, modalId) {
    const imgElement = document.querySelector('#' + modalId + ' #preview-image');
    if (url.trim() === '') {
        imgElement.src = imgElement.dataset.defaultUrl;
    } else {
        imgElement.src = url;
    }
}
