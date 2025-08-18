<h2>
  {{ $job->title }}
</h2>


<p>
  congrats! Your is now live on our website
</p>


<p>
  <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Now</a>
</p>