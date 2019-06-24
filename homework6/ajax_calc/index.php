<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<input type="text" id="val1" value="">
<button class='action' value="+"> +</button>
<button class='action' value="-"> -</button>
<button class='action' value="*"> *</button>
<button class='action' value="/"> /</button>
<input type="text" id="val2" value="">
<span> = </span>
<input type="text" id="val3" value=""><br>

<script>
    $(document).ready(function () {
        $(".action").on('click', function () {
            let operand1 = $("#val1").val();
            let operand2 = $("#val2").val();
            let operation = $(this).val();
            $.ajax({
                url: "add.php",
                type: "POST",
                dataType: "json",
                data: {
                    operand1: operand1,
                    operand2: operand2,
                    operation: operation
                },
                error: function () {
                    alert("Что-то пошло не так...");
                },
                success: function (answer) {
                    $('#val3').val(answer.result);
                }

            })
        });

    });
</script>

	