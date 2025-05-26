
@section('title', 'CentroMulticerviços - Criar conta')


@section('title', 'CentroMulticerviços - Login')
<div class="flex">
        <nav class="hidden md:block grayscale-100 hover:grayscale-0 ease-linear duration-500">
            <img src="{{ asset('/home/img/img_formulario.jpg') }}" alt="" srcset="" class="h-screen w-[55vw]">
        </nav>
        <nav class="md:w-[50vw] bg-[#151515] flex flex-col items-center p-14 h-max md:h-screen overflow-y-scroll sm:overflow-y-scroll md:overflow-y-scroll navAllContent ">
            <a href="/" class="flex items-center justify-center"><img src="{{ asset('/home/img/logo.png') }}" alt="" srcset="" class="md:w-[50%] w-[55%]"></a>
            <nav class="formContainer" id="formRegistro">
               
                    <div>
                        <h1 class="font-inter text-3xl font-bold text-white text-center md:text-left">Bem-vindo ao <span class="textoColorido">Centro Multiserviços.</span></h1>
                        <p class="font-roboto text-[#B0B0B0] font-bold text-[10pt] text-center md:text-left">Eletrificamos Angola.</p>
                        <p class="pt-2.5 text-white font-inter font-extralight md:text-left text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos neque modi quidem tempore, ratione odit voluptas nostrum omnis eius provident recusandae necessitatibus nobis veritatis corrupti repellendus aperiam fugit praesentium quia.</p>
                        <div class="contentNavInputs">
                            <nav class="navInputs">
                                <input wire:model='fullname' type="text" placeholder="" id="usuarioRegistro" required>
                                <label for="usuarioRegistro">Nome do Usuário *</label>
                                @error('fullname') <sapn style="color:red;">{{$message}}</sapn> @enderror      
                            </nav>
                            <nav class="navInputs mt-3 md:mt-auto">
                                <input wire:model='email' type="email" placeholder="" id="emailRegistro" required>
                                <label for="emailRegistro">E-mail *</label>
                                 @error('email') <sapn style="color:red;">{{$message}}</sapn> @enderror 
                            </nav>
                        </div>
                        <div class="contentNavInputs">
                            <nav class="navInputs">
                                <input wire:model='password' type="password" placeholder="" id="senhaRegistro" required>
                                <label for="senhaRegistro">Palavra-Passe *</label>
                                @error('password') <sapn style="color:red;">{{$message}}</sapn> @enderror 
                            </nav>
                            <nav class="navInputs">
                                <input wire:model='password_confirmation' type="password" placeholder="" id="confirmarSenhaRegistro" required>
                                <label for="confirmarSenhaRegistro">Confirmar Palavra-Passe *</label>
                                @error('password_confirmation') <sapn style="color:red;">{{$message}}</sapn> @enderror 
                            </nav>
                        </div>
                        <div class="contentNavInputs">
                            <nav class="navInputs">
                                <input wire:model='phone_number' type="tel" placeholder="" id="telefone" required>
                                <label for="telefone">Telefone *</label>
                                @error('phone_number') <sapn style="color:red;">{{$message}}</sapn> @enderror 
                            </nav>
                            <nav class="navInputs mt-3 md:mt-0">
                                <input wire:model='birthday' type="date" placeholder="" id="data" required class="w-[213px]">
                                <label for="data">Data de Nascimento *</label>
                                @error('birthday') <sapn style="color:red;">{{$message}}</sapn> @enderror
                            </nav>
                        </div>
                        <div class="contentNavInputs">
                            <nav class="navInputs">
                                <textarea wire:model="address" id="endereco" class="w-[313px] resize-none h-[220px]" placeholder=""></textarea>
                                <label for="endereco" class="hidden md:block">Endereço *</label>
                                @error('address') <sapn style="color:red;">{{$message}}</sapn> @enderror
                            </nav>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center pt-[20%]">
                        <nav class="navBotoes">
                            <a href="/"><button type="button" class="botao">Cancelar</button></a>
                            <button wire:click='sign_up' class="botao botaoPrimario">Confirmar</button>
                        </nav>
                        <nav class="text-center">
                            <p class="font-inter pt-[2%] font-medium text-white">Se você já possui uma conta, clique <a href="{{ route('login') }}" class="text-[#E10600] hover:underline cursor-pointer mostrarForm2">aqui</a> para iniciar sessão.</p>
                            <p class="text-[#B0B0B0] font-inter font-extralight pt-[4%]">&copy;2025 - <span class="textoColorido font-bold">Centro Multisserviços</span> - Todos os direitos reservados</p>
                        </nav>
                    </div>
            </nav>

            
        </nav>
    </div>

