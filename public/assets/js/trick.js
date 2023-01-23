/*------ input type file button ------*/


$("#button-addon1").click(function () {
    $("#formFileMultiple").click();
});

/*------ TricForm ------*/

const addVideoFormToCollection = (e) => {
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
    
    const item = document.createElement('li');

    console.log(item.childNodes);
   
    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    // add a delete link to the new form
    addVideoFormDeleteLink(item);         //addTagFormDeleteLink

    collectionHolder.appendChild(item);

    collectionHolder.dataset.index++;
};

const addImageFormToCollection = (e) => {
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
    
    const item = document.createElement('li');

    console.log(item.childNodes);
   
    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    // add a delete link to the new form
    addImageFormDeleteLink(item);         //addTagFormDeleteLink

    collectionHolder.appendChild(item);

    collectionHolder.dataset.index++;
};

const addImageFormDeleteLink = (item) => {
    const removeFormButton = document.createElement('button');

    removeFormButton.classList.add("btn","btn-outline-danger", "btn-lg", "mb-4")
    
    removeFormButton.innerText = 'Delete this image';

    item.append(removeFormButton);

    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the video form
        item.remove();
    });
}

const addVideoFormDeleteLink = (item) => {
    const removeFormButton = document.createElement('button');

    removeFormButton.classList.add("btn","btn-outline-danger", "btn-lg", "mb-4")
    
    removeFormButton.innerText = 'Delete this video';

    item.append(removeFormButton);

    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the video form
        item.remove();
    });
}


document
    .querySelectorAll('.add_item_link_video')
    .forEach(btn => {
        btn.addEventListener("click", addVideoFormToCollection)
    });

document
    .querySelectorAll('.add_item_link_image')
    .forEach(btn => {
        btn.addEventListener("click", addImageFormToCollection)
    });

document
    .querySelectorAll('ul.videos li')
    .forEach((item) => {
        addVideoFormDeleteLink(item)
    })

document
    .querySelectorAll('ul.images li')
    .forEach((item) => {
        addImageFormDeleteLink(item)
    })