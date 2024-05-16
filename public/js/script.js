

document.getElementById('showAddForm').addEventListener('click', function() {
    document.getElementById('addFormContainer').classList.remove('hidden');
});

document.getElementById('hideAddForm').addEventListener('click', function() {
    document.getElementById('addFormContainer').classList.add('hidden');
});

// document.getElementById('showFormEditData').addEventListener('click', function() {
//     document.getElementById('editFormContainer').classList.remove('hidden');
// });

// document.getElementById('hideEditeForm').addEventListener('click', function() {
//     document.getElementById('editFormContainer').classList.add('hidden');
// });


const showFormEditData = document.querySelectorAll('.showFormEditData');
const editFormContainer = document.getElementById('editFormContainer');
const hideEditeForm = document.getElementById('hideEditeForm');

hideEditeForm.addEventListener('click', () => {
    editFormContainer.classList.toggle('hidden');
});

showFormEditData.forEach(function(show){
    show.addEventListener('click', function() {
        editFormContainer.classList.toggle('hidden');
    });
});

document.querySelectorAll('.bg-gray-200').forEach((item) => {
    item.addEventListener('click', () => {
        const isOpen = item.nextElementSibling.classList.toggle('hidden');
        item.lastElementChild.classList.toggle('rotate-180', !isOpen);
    });
});