
$("#AddNew").on("click", function(){
    $("#ExpenseModal").modal("show");
})

$("#ExpenseForm").on("submit", function(e){
    e.preventDefault();
})