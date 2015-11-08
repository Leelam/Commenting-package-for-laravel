<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

{{$parentAndComments->id}}
<hr>
{!!  Form::open( [ 'route'=> ['commentStore'] ] ) !!}
{!! Form::hidden('modelAndValue', Crypt::encrypt( get_class($parentAndComments).':'.$parentAndComments->id ) ) !!} {{-- TODO :: need to apply encrytion --}}
{!!Form::textarea('comment')!!}

{!! Form::submit('comment') !!}
{!!Form::close()!!}
<hr>
@foreach($parentAndComments['comments'] as $comment)
	<div class="media">
		<a class="media-left" href="#">
			<img class="media-object" src="{{$comment->author->avatar}}" alt="IMG from DB">
		</a>
		<div class="media-body">
			<h4 class="media-heading">{{$comment->author->full_name}}</h4>
			{{$comment->comment}}
		</div>
	</div>
	@endforeach


			<!-- jQuery first, then Bootstrap JS. -->
	{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>--}}
</body>
</html>