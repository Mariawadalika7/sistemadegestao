<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In / Sign Up</title>
  @assets
  @endassets
  <livewire:styles />
</head>
<body>
    <div>
            {{ $slot }}  
            <livewire:scripts />      
    </div>
    @script
    @endscript
</body>
</html>


