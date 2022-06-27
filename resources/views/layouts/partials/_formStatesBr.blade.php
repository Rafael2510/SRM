<select id="{{ isset($stateId) ? $stateId : 'inputState' }}" name="{{ isset($stateName) ? $stateName : 'state' }}" {{ isset($stateRequired) && $stateRequired ? 'required' : '' }} class="form-control" wire:model="{{ isset($stateName) ? $stateName : 'state' }}">
    <option value="" {{ isset($stateValue) && $stateValue == '' ? 'selected' : ''}}>Selecionar</option>
    <option value="AC" {{ isset($stateValue) && $stateValue == 'AC' ? 'selected' : ''}}>Acre</option>
    <option value="AL" {{ isset($stateValue) && $stateValue == 'AL' ? 'selected' : ''}}>Alagoas</option>
    <option value="AP" {{ isset($stateValue) && $stateValue == 'AP' ? 'selected' : ''}}>Amapá</option>
    <option value="AM" {{ isset($stateValue) && $stateValue == 'AM' ? 'selected' : ''}}>Amazonas</option>
    <option value="BA" {{ isset($stateValue) && $stateValue == 'BA' ? 'selected' : ''}}>Bahia</option>
    <option value="CE" {{ isset($stateValue) && $stateValue == 'CE' ? 'selected' : ''}}>Ceará</option>
    <option value="DF" {{ isset($stateValue) && $stateValue == 'DF' ? 'selected' : ''}}>Distrito Federal</option>
    <option value="GO" {{ isset($stateValue) && $stateValue == 'GO' ? 'selected' : ''}}>Goiás</option>
    <option value="ES" {{ isset($stateValue) && $stateValue == 'ES' ? 'selected' : ''}}>Espírito Santo</option>
    <option value="MA" {{ isset($stateValue) && $stateValue == 'MA' ? 'selected' : ''}}>Maranhão</option>
    <option value="MT" {{ isset($stateValue) && $stateValue == 'MT' ? 'selected' : ''}}>Mato Grosso</option>
    <option value="MS" {{ isset($stateValue) && $stateValue == 'MS' ? 'selected' : ''}}>Mato Grosso do Sul</option>
    <option value="MG" {{ isset($stateValue) && $stateValue == 'MG' ? 'selected' : ''}}>Minas Gerais</option>
    <option value="PA" {{ isset($stateValue) && $stateValue == 'PA' ? 'selected' : ''}}>Pará</option>
    <option value="PB" {{ isset($stateValue) && $stateValue == 'PB' ? 'selected' : ''}}>Paraiba</option>
    <option value="PR" {{ isset($stateValue) && $stateValue == 'PR' ? 'selected' : ''}}>Paraná</option>
    <option value="PE" {{ isset($stateValue) && $stateValue == 'PE' ? 'selected' : ''}}>Pernambuco</option>
    <option value="PI" {{ isset($stateValue) && $stateValue == 'PI' ? 'selected' : ''}}>Piauí</option>
    <option value="RJ" {{ isset($stateValue) && $stateValue == 'RJ' ? 'selected' : ''}}>Rio de Janeiro</option>
    <option value="RN" {{ isset($stateValue) && $stateValue == 'RN' ? 'selected' : ''}}>Rio Grande do Norte</option>
    <option value="RS" {{ isset($stateValue) && $stateValue == 'RS' ? 'selected' : ''}}>Rio Grande do Sul</option>
    <option value="RO" {{ isset($stateValue) && $stateValue == 'RO' ? 'selected' : ''}}>Rondônia</option>
    <option value="RR" {{ isset($stateValue) && $stateValue == 'RR' ? 'selected' : ''}}>Roraima</option>
    <option value="SP" {{ isset($stateValue) && $stateValue == 'SP' ? 'selected' : ''}}>São Paulo</option>
    <option value="SC" {{ isset($stateValue) && $stateValue == 'SC' ? 'selected' : ''}}>Santa Catarina</option>
    <option value="SE" {{ isset($stateValue) && $stateValue == 'SE' ? 'selected' : ''}}>Sergipe</option>
    <option value="TO" {{ isset($stateValue) && $stateValue == 'TO' ? 'selected' : ''}}>Tocantins</option>
</select>
