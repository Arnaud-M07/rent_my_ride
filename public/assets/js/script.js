
// Display modal on delete button
document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll('.formDelete');
    const modalTitle = document.querySelector('#modalDelete .modal-title span');
    const deleteLink = document.querySelector('#modalDelete .deleteModalBtn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const categoryId = event.currentTarget.getAttribute('data-category-id');
            const categoryName = event.currentTarget.getAttribute('data-category-name');
            modalTitle.textContent = categoryName;
            deleteLink.href = '/controllers/dashboard/categories/delete-ctrl.php?id=' + categoryId;
        });
    });
});