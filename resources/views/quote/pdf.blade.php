<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización #{{ $quote->id }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', 'DejaVu Sans', sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #1a202c;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }
        
        .pdf-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.95;
            font-weight: 300;
        }
        
        .quote-info {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 35px;
            border: 1px solid #e2e8f0;
            position: relative;
        }
        
        .quote-info::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 3px 0 0 3px;
        }
        
        .quote-info h3 {
            margin: 0 0 20px 0;
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
        }
        
        .section {
            margin-bottom: 35px;
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e2e8f0;
        }
        
        .section h3 {
            color: #2d3748;
            font-size: 20px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
            position: relative;
        }
        
        .section h3::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            font-weight: 600;
            padding: 12px 20px 12px 0;
            width: 35%;
            color: #4a5568;
            font-size: 14px;
        }
        
        .info-value {
            display: table-cell;
            padding: 12px 0;
            color: #2d3748;
            font-weight: 500;
            font-size: 14px;
        }
        
        .info-grid {
            display: table;
            width: 100%;
            margin-top: 20px;
        }
        
        .services-grid {
            display: table;
            width: 100%;
            margin: 25px 0;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        
        .service-row {
            display: table-row;
        }
        
        .service-row:nth-child(even) {
            background-color: #f7fafc;
        }
        
        .service-name {
            display: table-cell;
            padding: 16px 20px;
            font-weight: 500;
            width: 65%;
            color: #2d3748;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .service-status {
            display: table-cell;
            padding: 16px 20px;
            text-align: center;
            width: 35%;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .price-total {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            border-radius: 16px;
            margin-bottom: 35px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .price-total h3 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .price-total .amount {
            font-size: 48px;
            font-weight: 700;
            margin: 20px 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .price-total p {
            margin: 0;
            font-size: 16px;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .notes {
            background: linear-gradient(135deg, #fef5e7 0%, #fdf2e9 100%);
            border: 1px solid #f6ad55;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 35px;
            position: relative;
        }
        
        .notes::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            background: linear-gradient(135deg, #f6ad55 0%, #ed8936 100%);
            border-radius: 3px 0 0 3px;
        }
        
        .notes h4 {
            margin-top: 0;
            color: #c05621;
            font-weight: 600;
            font-size: 18px;
        }
        
        .footer {
            text-align: center;
            color: #718096;
            font-size: 12px;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 2px solid #e2e8f0;
        }
        
        .contact-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 16px;
            text-align: center;
            margin-bottom: 35px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .contact-info h4 {
            margin: 0 0 15px 0;
            font-size: 20px;
            font-weight: 600;
        }
        
        .contact-info p {
            margin: 8px 0;
            font-size: 16px;
            opacity: 0.95;
        }
        
        .status-included {
            color: #38a169;
            font-weight: 600;
            font-size: 16px;
        }
        
        .status-not-included {
            color: #e53e3e;
            font-weight: 500;
            font-size: 16px;
        }
        
        .service-row:last-child .service-name,
        .service-row:last-child .service-status {
            border-bottom: none;
        }
        
        .highlight-box {
            background: linear-gradient(135deg, #e6fffa 0%, #b2f5ea 100%);
            border: 1px solid #38b2ac;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            position: relative;
        }
        
        .highlight-box::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);
            border-radius: 3px 0 0 3px;
        }
        
        .highlight-box h4 {
            margin-top: 0;
            color: #234e52;
            font-weight: 600;
            font-size: 18px;
        }
        
        .terms-section {
            background: #f7fafc;
            padding: 25px;
            border-radius: 12px;
            margin: 35px 0;
            border: 1px solid #e2e8f0;
        }
        
        .terms-section h4 {
            color: #2d3748;
            font-weight: 600;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        .terms-section ul {
            margin: 0;
            padding-left: 20px;
        }
        
        .terms-section li {
            margin-bottom: 8px;
            color: #4a5568;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="pdf-container">
        <div class="header">
            <h1>COTIZACIÓN DE DESARROLLO WEB</h1>
            <p>Cotización #{{ $quote->id }} - {{ $quote->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="quote-info">
            <h3>Información de la Cotización</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Fecha de emisión:</div>
                    <div class="info-value">{{ $quote->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Válida hasta:</div>
                    <div class="info-value">{{ $quote->created_at->addDays(30)->format('d/m/Y') }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <h3>Información del Cliente</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Nombre:</div>
                    <div class="info-value">{{ $quote->name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $quote->email }}</div>
                </div>
                @if($quote->phone)
                <div class="info-row">
                    <div class="info-label">Teléfono:</div>
                    <div class="info-value">{{ $quote->phone }}</div>
                </div>
                @endif
                @if($quote->company)
                <div class="info-row">
                    <div class="info-label">Empresa:</div>
                    <div class="info-value">{{ $quote->company }}</div>
                </div>
                @endif
            </div>
        </div>

        <div class="section">
            <h3>Detalles del Proyecto</h3>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Tipo de Sitio:</div>
                    <div class="info-value">{{ $quote->website_type_name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Número de Páginas:</div>
                    <div class="info-value">{{ $quote->pages }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Nivel de SEO:</div>
                    <div class="info-value">{{ $quote->seo_level_name }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <h3>Servicios y Características</h3>
            <div class="services-grid">
                <div class="service-row">
                    <div class="service-name">Cliente tiene dominio</div>
                    <div class="service-status">
                        <span class="{{ $quote->has_domain ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->has_domain ? '✓ Sí' : '✗ No' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Sistema de administración (CMS)</div>
                    <div class="service-status">
                        <span class="{{ $quote->needs_cms ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->needs_cms ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Alojamiento web</div>
                    <div class="service-status">
                        <span class="{{ $quote->needs_hosting ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->needs_hosting ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Integración redes sociales</div>
                    <div class="service-status">
                        <span class="{{ $quote->social_integration ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->social_integration ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Google Analytics</div>
                    <div class="service-status">
                        <span class="{{ $quote->google_analytics ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->google_analytics ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Sistema de respaldo</div>
                    <div class="service-status">
                        <span class="{{ $quote->backup_system ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->backup_system ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Certificado SSL</div>
                    <div class="service-status">
                        <span class="{{ $quote->ssl_certificate ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->ssl_certificate ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Mantenimiento mensual</div>
                    <div class="service-status">
                        <span class="{{ $quote->maintenance ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->maintenance ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-name">Sitio multi-idioma</div>
                    <div class="service-status">
                        <span class="{{ $quote->multilanguage ? 'status-included' : 'status-not-included' }}">
                            {{ $quote->multilanguage ? '✓ Incluido' : '✗ No incluido' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        @if($quote->additional_notes)
        <div class="notes">
            <h4>Notas Adicionales</h4>
            <p>{{ $quote->additional_notes }}</p>
        </div>
        @endif

        <div class="price-total">
            <h3>PRECIO TOTAL</h3>
            <div class="amount">${{ number_format($quote->total_price, 0, ',', '.') }}</div>
            <p>Pesos Colombianos</p>
        </div>

        <div class="highlight-box">
             <h4>🎯 Próximos Pasos</h4>
             <p>Una vez aprobada esta cotización, procederemos con:</p>
             <ul style="margin: 10px 0; padding-left: 20px;">
                 <li>Reunión inicial para definir detalles específicos</li>
                 <li>Creación del cronograma de desarrollo</li>
                 <li>Inicio del proceso de diseño y desarrollo</li>
                 <li>Entregas parciales para revisión y feedback</li>
             </ul>
         </div>

         <div class="terms-section">
             <h4>Términos y Condiciones</h4>
             <ul>
                 <li>Esta cotización tiene una validez de 30 días calendario</li>
                 <li>Los precios incluyen IVA cuando aplique</li>
                 <li>El proyecto se desarrollará en fases con entregas parciales</li>
                 <li>Se requiere un anticipo del 50% para iniciar el proyecto</li>
                 <li>El tiempo de desarrollo estimado es de 2-4 semanas según complejidad</li>
                 <li>Se incluyen 2 rondas de revisiones sin costo adicional</li>
                 <li>El mantenimiento incluye actualizaciones de seguridad y respaldos</li>
                 <li>Los dominios y hosting tienen costos anuales adicionales</li>
             </ul>
         </div>

         <div class="contact-info">
             <h4>Información de Contacto</h4>
             <p>Email: admin@caprietoj.com</p>
             <p>Horario de atención: Lunes a Viernes, 8:00 AM - 6:00 PM</p>
             <p>Tiempo de respuesta: Menos de 24 horas</p>
             <p>Para cualquier consulta o aclaración sobre esta cotización</p>
         </div>
 
         <div class="footer">
             <p>🔒 Documento generado de forma segura por nuestro sistema de cotizaciones</p>
             <p>Esta cotización es válida por 30 días a partir de la fecha de emisión.</p>
             <p>Los precios están sujetos a cambios según los requerimientos específicos del proyecto.</p>
             <p>© {{ date('Y') }} Cotizador Web - Todos los derechos reservados</p>
         </div>
    </div>
</body>
</html>