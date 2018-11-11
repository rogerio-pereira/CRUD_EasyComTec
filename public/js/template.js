$('#btnPersonalInfoNext').click(function() {
    $('#bankTab').tab('show');
    $('#bank_information').focus();
});

$('#btnBankBack').click(function() {
    $('#personalInfoTab').tab('show');
    $('#name').focus();
});

$('#btnBankNext').click(function() {
    $('#knowledgeTab').tab('show');
});

$('#btnKnowledgeBack').click(function() {
    $('#bankTab').tab('show');
    $('#bank_information').focus();
});

$('#interviewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);

    modal.find('#id').val(id);
})