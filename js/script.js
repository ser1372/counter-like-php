$(document).ready(function() {
	$(".like").bind("click", function() {
		var link = $(this);
		var id = link.data('id');
		$.ajax({
			url: "/like.php", 
			type: "POST",
			data: {id:id}, // �������� ID ����� ������
			dataType: "json", 
			success: function(result) {
				if (!result.error){ //���� �� ������� �� ��������� ������ �� ��������� ���������� ������ �� ��������
					link.addClass('active'); // �������� ���� ��� "�������������"
					$('.counter',link).html(result.count);
				}else{
					alert(result.message);
				}
			}
		});
	});
});