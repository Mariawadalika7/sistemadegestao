<h1 class="h3 mb-1">Cadastro de Clientes</h1>
<p class="text-muted mb-4">Gestão de Clientes ENDE (Empresa Nacional de Distribuição de Electricidade)</p>

<!-- Formulário de Cadastro -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="row g-4">
        <!-- Informações Básicas -->
        <div class="col-md-12">
            <h4 class="mb-3">Informações Básicas</h4>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nome/Denominação Social</label>
            <input type="text" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">NIF (Número de Identificação Fiscal)</label>
            <input type="text" class="form-control" placeholder="0000000000" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Tipo de Cliente</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <option>Doméstico</option>
                <option>Comercial</option>
                <option>Industrial</option>
                <option>Instituição Pública</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Telefone</label>
            <input type="tel" class="form-control" placeholder="(+244) 900 000 000" required>
        </div>

        <!-- Endereço -->
        <div class="col-md-12 mt-4">
            <h4 class="mb-3">Endereço da Instalação</h4>
        </div>

        <div class="col-md-4">
            <label class="form-label">Província</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <option>Luanda</option>
                <option>Benguela</option>
                <option>Huambo</option>
                <option>Huíla</option>
                <option>Cabinda</option>
                <!-- Adicionar outras províncias -->
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Município</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <!-- Municípios serão carregados baseado na província -->
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Distrito/Comuna</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <!-- Distritos serão carregados baseado no município -->
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Bairro</label>
            <input type="text" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Rua</label>
            <input type="text" class="form-control" required>
        </div>

        <div class="col-md-2">
            <label class="form-label">Número</label>
            <input type="text" class="form-control" required>
        </div>

        <!-- Informações Técnicas -->
        <div class="col-md-12 mt-4">
            <h4 class="mb-3">Informações Técnicas</h4>
        </div>

        <div class="col-md-4">
            <label class="form-label">Número do Contador</label>
            <input type="text" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Tipo de Fornecimento</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <option>Baixa Tensão</option>
                <option>Média Tensão</option>
                <option>Alta Tensão</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Potência Contratada (kVA)</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <option>3.3 kVA</option>
                <option>6.6 kVA</option>
                <option>11 kVA</option>
                <option>15 kVA</option>
                <option>20 kVA</option>
                <!-- Adicionar outras potências -->
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Tipo de Contador</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <option>Pré-pago</option>
                <option>Pós-pago</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Tarifa</label>
            <select class="form-select" required>
                <option value="">Selecione...</option>
                <option>Doméstica Social</option>
                <option>Doméstica</option>
                <option>Comercial</option>
                <option>Industrial</option>
                <option>Especial</option>
            </select>
        </div>

        <!-- Botões -->
        <div class="col-12 mt-4">
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Registrar Cliente
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Adicionar validações e máscaras para os campos
    document.addEventListener('DOMContentLoaded', function() {
        // Exemplo de carregamento dinâmico de municípios
        const provincia = document.querySelector('select[name="provincia"]');
        const municipio = document.querySelector('select[name="municipio"]');

        provincia.addEventListener('change', function() {
            // Aqui você pode carregar os municípios baseado na província selecionada
            // Usando AJAX ou um objeto com os dados
        });

        // Máscara para telefone angolano
        const telefone = document.querySelector('input[type="tel"]');
        telefone.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 9) value = value.slice(0, 9);
            e.target.value = value.replace(/(\d{3})(\d{3})(\d{3})/, '(+244) $1 $2 $3');
        });

        // Máscara para NIF
        const nif = document.querySelector('input[placeholder="0000000000"]');
        nif.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) value = value.slice(0, 10);
            e.target.value = value;
        });
    });
</script>
@endpush
