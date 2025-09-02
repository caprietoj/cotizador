@extends('layouts.app')

@section('title', 'Cotizador de Páginas Web')

@section('content')
<div class="card">
    <form id="quoteForm">
        @csrf
        
        <!-- Datos Personales -->
        <h2 style="color: #364e76; margin-bottom: 2rem; border-bottom: 2px solid #364e76; padding-bottom: 0.5rem;">Datos Personales</h2>
        
        <div class="form-row">
            <div class="form-group">
                <label for="name">Nombre Completo *</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico *</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" id="phone" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="company">Empresa</label>
                <input type="text" id="company" name="company" class="form-control">
            </div>
        </div>

        <!-- Tipo de Página Web -->
        <h2 style="color: #364e76; margin: 3rem 0 2rem 0; border-bottom: 2px solid #364e76; padding-bottom: 0.5rem;">Tipo de Página Web</h2>
        
        <div class="form-group">
            <label for="website_type">Selecciona el tipo de sitio web *</label>
            <select id="website_type" name="website_type" class="form-control" required>
                <option value="">Selecciona una opción</option>
                <option value="landing">Landing Page</option>
                <option value="corporate">Sitio Corporativo</option>
                <option value="ecommerce">Tienda Online</option>
                <option value="blog">Blog/Revista</option>
                <option value="portfolio">Portafolio</option>
                <option value="custom">Personalizado</option>
            </select>
        </div>

        <div class="form-group" id="pages-group" style="display: none;">
            <label for="pages">Número de páginas</label>
            <input type="number" id="pages" name="pages" class="form-control" min="1" max="100" value="1">
            <small style="color: #666; margin-top: 0.5rem; display: block;">Especifica cuántas páginas necesitas para tu sitio web</small>
        </div>

        <!-- Servicios y Características -->
        <h2 style="color: #364e76; margin: 3rem 0 2rem 0; border-bottom: 2px solid #364e76; padding-bottom: 0.5rem;">Servicios y Características</h2>
        
        <div class="checkbox-group">
            <div class="checkbox-item">
                <input type="checkbox" id="has_domain" name="has_domain" value="1">
                <label for="has_domain">Ya tengo dominio</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="needs_cms" name="needs_cms" value="1">
                <label for="needs_cms">Sistema de administración (CMS)</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="needs_hosting" name="needs_hosting" value="1">
                <label for="needs_hosting">Alojamiento web (Hosting)</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="social_integration" name="social_integration" value="1">
                <label for="social_integration">Integración con redes sociales</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="google_analytics" name="google_analytics" value="1">
                <label for="google_analytics">Google Analytics</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="backup_system" name="backup_system" value="1">
                <label for="backup_system">Sistema de respaldo</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="ssl_certificate" name="ssl_certificate" value="1">
                <label for="ssl_certificate">Certificado SSL</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="maintenance" name="maintenance" value="1">
                <label for="maintenance">Mantenimiento mensual</label>
            </div>
            
            <div class="checkbox-item">
                <input type="checkbox" id="multilanguage" name="multilanguage" value="1">
                <label for="multilanguage">Sitio multi-idioma</label>
            </div>
        </div>

        <!-- SEO -->
        <h2 style="color: #364e76; margin: 3rem 0 2rem 0; border-bottom: 2px solid #364e76; padding-bottom: 0.5rem;">Optimización SEO</h2>
        
        <div class="form-group">
            <label for="seo_level">Nivel de SEO *</label>
            <select id="seo_level" name="seo_level" class="form-control" required>
                <option value="none">Sin SEO</option>
                <option value="basic">SEO Básico</option>
                <option value="advanced">SEO Avanzado</option>
            </select>
        </div>

        <!-- Notas Adicionales -->
        <div class="form-group">
            <label for="additional_notes">Notas adicionales o requerimientos especiales</label>
            <textarea id="additional_notes" name="additional_notes" class="form-control" rows="4" placeholder="Describe cualquier funcionalidad específica o requerimiento especial para tu proyecto..."></textarea>
        </div>

        <!-- Precio Estimado -->
        <div class="price-display" id="price-display" style="display: none;">
            <h3>Precio Estimado</h3>
            <div class="price-amount" id="price-amount">$0</div>
            <div class="price-currency">Pesos Colombianos</div>
        </div>

        <!-- Botones -->
        <div style="text-align: center; margin-top: 2rem;">
            <button type="button" id="calculate-btn" class="btn btn-secondary" style="margin-right: 1rem;">Calcular Precio</button>
            <button type="submit" id="submit-btn" class="btn btn-primary">Generar Cotización</button>
        </div>

        <!-- Loading -->
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Procesando cotización...</p>
        </div>

        <!-- Mensajes -->
        <div id="messages"></div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quoteForm');
    const websiteTypeSelect = document.getElementById('website_type');
    const pagesGroup = document.getElementById('pages-group');
    const pagesInput = document.getElementById('pages');
    const calculateBtn = document.getElementById('calculate-btn');
    const submitBtn = document.getElementById('submit-btn');
    const priceDisplay = document.getElementById('price-display');
    const priceAmount = document.getElementById('price-amount');
    const loading = document.getElementById('loading');
    const messages = document.getElementById('messages');

    // Manejar cambio de tipo de sitio web
    websiteTypeSelect.addEventListener('change', function() {
        if (this.value === 'landing') {
            pagesGroup.style.display = 'none';
            pagesInput.value = 1;
        } else if (this.value !== '') {
            pagesGroup.style.display = 'block';
            if (pagesInput.value < 2) {
                pagesInput.value = 2;
            }
        } else {
            pagesGroup.style.display = 'none';
        }
        
        // Recalcular precio si ya se mostró
        if (priceDisplay.style.display !== 'none') {
            calculatePrice();
        }
    });

    // Manejar checkboxes
    document.querySelectorAll('.checkbox-item input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const item = this.closest('.checkbox-item');
            if (this.checked) {
                item.classList.add('checked');
            } else {
                item.classList.remove('checked');
            }
            
            // Recalcular precio si ya se mostró
            if (priceDisplay.style.display !== 'none') {
                calculatePrice();
            }
        });
    });

    // Recalcular precio cuando cambie el número de páginas o SEO
    pagesInput.addEventListener('input', function() {
        if (priceDisplay.style.display !== 'none') {
            calculatePrice();
        }
    });

    document.getElementById('seo_level').addEventListener('change', function() {
        if (priceDisplay.style.display !== 'none') {
            calculatePrice();
        }
    });

    // Calcular precio
    calculateBtn.addEventListener('click', calculatePrice);

    function calculatePrice() {
        const formData = new FormData(form);
        
        // Convertir FormData a objeto
        const data = {};
        for (let [key, value] of formData.entries()) {
            if (data[key]) {
                if (Array.isArray(data[key])) {
                    data[key].push(value);
                } else {
                    data[key] = [data[key], value];
                }
            } else {
                data[key] = value;
            }
        }

        // Asegurar valores booleanos
        const booleanFields = ['has_domain', 'needs_cms', 'needs_hosting', 'social_integration', 
                              'google_analytics', 'backup_system', 'ssl_certificate', 'maintenance', 'multilanguage'];
        
        booleanFields.forEach(field => {
            data[field] = data[field] ? true : false;
        });

        // Validar campos requeridos
        if (!data.website_type) {
            showMessage('Por favor selecciona el tipo de sitio web', 'error');
            return;
        }

        fetch('/calculate-price', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            priceAmount.textContent = '$' + data.price;
            priceDisplay.style.display = 'block';
            priceDisplay.scrollIntoView({ behavior: 'smooth' });
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Error al calcular el precio', 'error');
        });
    }

    // Enviar formulario
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar campos requeridos
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        loading.style.display = 'block';
        submitBtn.disabled = true;
        
        const formData = new FormData(form);
        
        // Convertir FormData a objeto
        const data = {};
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }

        // Asegurar valores booleanos
        const booleanFields = ['has_domain', 'needs_cms', 'needs_hosting', 'social_integration', 
                              'google_analytics', 'backup_system', 'ssl_certificate', 'maintenance', 'multilanguage'];
        
        booleanFields.forEach(field => {
            data[field] = data[field] ? true : false;
        });

        fetch('/quote', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            loading.style.display = 'none';
            submitBtn.disabled = false;
            
            if (data.success) {
                showMessage(data.message, 'success');
                form.reset();
                priceDisplay.style.display = 'none';
                // Limpiar checkboxes marcados
                document.querySelectorAll('.checkbox-item.checked').forEach(item => {
                    item.classList.remove('checked');
                });
            } else {
                if (data.errors) {
                    let errorMessage = 'Errores de validación:<br>';
                    for (let field in data.errors) {
                        errorMessage += '- ' + data.errors[field].join(', ') + '<br>';
                    }
                    showMessage(errorMessage, 'error');
                } else {
                    showMessage('Error al procesar la cotización', 'error');
                }
            }
        })
        .catch(error => {
            loading.style.display = 'none';
            submitBtn.disabled = false;
            console.error('Error:', error);
            showMessage('Error al enviar la cotización', 'error');
        });
    });

    function showMessage(message, type) {
        messages.innerHTML = `<div class="alert alert-${type === 'error' ? 'error' : 'success'}">${message}</div>`;
        messages.scrollIntoView({ behavior: 'smooth' });
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            messages.innerHTML = '';
        }, 5000);
    }
});
</script>
@endpush