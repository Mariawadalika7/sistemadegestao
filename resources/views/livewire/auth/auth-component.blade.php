
<div class="flex">
    @section('title', 'CentroMulticerviços - Login')
        <nav class="hidden md:block grayscale-100 hover:grayscale-0 ease-linear duration-500">
            <img src="{{ asset('/home/img/img_formulario.jpg') }}" alt="" srcset="" class="h-screen w-[55vw]">
        </nav>
        <nav class="md:w-[50vw] bg-[#151515] flex flex-col items-center p-14 h-max md:h-screen overflow-y-scroll sm:overflow-y-scroll md:overflow-y-scroll navAllContent ">
            <a href="/" class="flex items-center justify-center"><img src="{{ asset('/home/img/logo.png') }}" alt="" srcset="" class="md:w-[50%] w-[55%]"></a>
         
            <nav class="formContainer" id="formLogin">
               
                    <div>
                        <h1 class="font-inter text-3xl font-bold text-white text-center md:text-left">Que bom vê-lo novamente! Pronto para <span class="text-[#e10600] font-bold textoColorido">eletrificar?</span></h1>
                        <p class="font-roboto text-[#B0B0B0] font-bold text-[10pt] text-center md:text-left">Eletrifique connosco.</p>
                        <p class="pt-2.5 text-white font-inter font-extralight md:text-left text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos neque modi quidem tempore, ratione odit voluptas nostrum omnis eius provident recusandae necessitatibus nobis veritatis corrupti repellendus aperiam fugit praesentium quia.</p>
                        
                     <form wire:submit='login()'>
                        <div class="contentNavInputs">
                            <nav class="navInputs mt-3 md:mt-auto">
                                <input wire:model='email' type="text" placeholder="" id="emailSessao" >
                                <label for="emailSessao">E-mail *</label>
                                @error('email')<span style="color:red;">{{$message}}</span>@enderror
                            </nav>
                            <nav class="navInputs">
                                <input wire:model='password' type="password" placeholder="" id="senhaSessao" >
                                <label for="senhaSessao">Palavra-Passe *</label>
                                @error('password')<span  style="color:red;">{{$message}}</span>@enderror
                            </nav>
                        </div>
                    
                        </div>
                        <div class="flex flex-col justify-center items-center pt-[20%]">
                            <nav class="navBotoes">
                                <a href="/"><button type="button" class="botao">Cancelar</button></a>
                                <button 
                                    type='submit' 
                                    class="botao botaoPrimario">
                                    Iniciar Sessão
                                </button>
                            </nav>
                            <nav class="text-center pb-3.5 md:pb-0">
                                <p class="font-inter pt-[2%] font-medium text-white">Se você ainda não possui uma conta, clique <a href="{{ route('user.sign.up') }}" class="text-[#E10600] hover:underline cursor-pointer mostrarForm1">aqui</a> para registrar-se.</p>
                                <p class="text-[#B0B0B0] font-inter font-extralight pt-[4%]">&copy;2025 - <span class="textoColorido font-bold">Centro Multisserviços</span> - Todos os direitos reservados</p>
                            </nav>
                        </div>
                    </form>
            </nav>
        </nav>
</div>

