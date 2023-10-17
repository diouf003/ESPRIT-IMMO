<div>

    @include("livewire.typearticles.editProp")
    @include("livewire.typearticles.addProp")
    @include("livewire.typearticles.list")


</div>

<script>
window.addEventListener("showEditForm", function(e) {
    Swal.fire({
        title: "edition d'un type de logement",
        input: 'text',
        inputValue: e.detail.typearticle.nom,
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
                return 'champ obligatoire!'
            }

            @this.updateTypeArticle(e.detail.typearticle.id, value)
        }
    })
})
</script>

<script>
window.addEventListener("showSuccessMessage", event => {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        toast: true,
        title: event.detail.message || "Opération éffectuée avec succès!",
        showConfirmButton: false,
        timer: 5000
    })
})
</script>


<script>
window.addEventListener("showSuccessMessage", event => {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        toast: true,
        title: event.detail.message || "Opération éffectuée avec succès!",
        showConfirmButton: false,
        timer: 5000
    })
})
</script>

<script>
window.addEventListener("showConfirmMessage", event => {
    Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            if (event.detail.message.data.type_article_id) {
                @this.deleteTypeArticle(event.detail.message.data.type_article_id)

            }
            // @this.resetPassword()
            if (event.detail.message.data.propriete_id) {
                @this.deleteProp(event.detail.message.data.propriete_id)
            }
        }
    })

})
</script>
<script>
window.addEventListener("showModal", event => {
    $("#modalProp").modal("show")

})
window.addEventListener("closeModal", event => {
    $("#modalProp").modal("hide")
})


//pour le edit modal 

window.addEventListener("showEditModal", event => {
    $("#editModalProp").modal("show")

})
window.addEventListener("closeEditModal", event => {
    $("#editModalProp").modal("hide")
})
</script>