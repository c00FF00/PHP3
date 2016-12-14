@include('header')




<form action="/client" method="post">
<input name="id" type="number">
<input name="email" type="email">
<input name="body" type="body">
<button type="submit">Отправить</button>
</form>


@include('footer')