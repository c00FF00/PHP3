@include('header')




<form action="/client" method="post">
<input name="id" type="number">
<input name="email" type="email">
<input name="body" type="text">
<input name="emailpattern" type="text">
<button type="submit">Отправить</button>
</form>


@include('footer')