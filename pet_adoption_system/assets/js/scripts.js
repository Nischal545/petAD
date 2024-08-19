/* assets/js/scripts.js */

// Example: Simple confirmation dialog for deleting items
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const confirmation = confirm('Are you sure you want to delete this item?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});
