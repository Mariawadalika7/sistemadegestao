<div>
    <form wire:submit='signIn'>
            <div>
                <input wire:model='email' type='email' />
                @error('email')<span style='color:red;'>{{$message}}</span>@enderror
            </div>
        
            <div>
                <input wire:model='password'  type='password' />
                @error('password')<span style='color:red;'>{{$message}}</span>@enderror
            </div>
        
            <div>
                <button type='submit' >Enter</button>
            </div>
    </form>


</div>
