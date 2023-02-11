<form action="Payment" method="POST">
    {{ @csrf_field() }}
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_4oyOo04IN4PKIA"
        data-amount="{{ session('price') }}" data-currency="INR" data-order_id="{{ session('order') }}"
        data-buttontext="Pay with Razorpay" data-name="Test App"
        data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
        data-image="https://example.com/your_logo.jpg" data-prefill.name="Gaurav"
        data-prefill.email="gaurav.kumar@example.com" data-theme.color="#F37254"></script>
    <input type="hidden" custom="Hidden Element" name="hidden" />
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script>
    $(window).ready(function() {
        $('.razorpay-payment-button').hide();
        $('.razorpay-payment-button').click();
    });
</script>
