<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización de Desarrollo Web</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.7;
            color: #2d3748;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 20px;
        }
        
        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 50px 40px;
            text-align: center;
            position: relative;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        }
        
        .header-content {
            position: relative;
            z-index: 1;
        }
        
        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        
        .header p {
            font-size: 18px;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .content {
            padding: 50px 40px;
        }
        
        .greeting {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #1a202c;
        }
        
        .intro-text {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 35px;
            line-height: 1.8;
        }
        
        .quote-summary {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            padding: 30px;
            border-radius: 16px;
            margin: 30px 0;
            border: 1px solid #e2e8f0;
            position: relative;
        }
        
        .quote-summary::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0 3px 3px 0;
        }
        
        .quote-summary h3 {
            font-size: 20px;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 20px;
        }
        
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .summary-item {
            display: flex;
            flex-direction: column;
        }
        
        .summary-label {
            font-size: 13px;
            font-weight: 500;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        
        .summary-value {
            font-size: 16px;
            font-weight: 600;
            color: #2d3748;
        }
        
        .price-highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 35px 30px;
            text-align: center;
            border-radius: 20px;
            margin: 35px 0;
            position: relative;
            overflow: hidden;
        }
        
        .price-highlight::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0%, 100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .price-content {
            position: relative;
            z-index: 1;
        }
        
        .price-highlight h3 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
            opacity: 0.9;
        }
        
        .price-highlight .amount {
            font-size: 42px;
            font-weight: 700;
            margin: 15px 0;
            letter-spacing: -1px;
        }
        
        .price-highlight .currency {
            font-size: 16px;
            opacity: 0.8;
            font-weight: 400;
        }
        
        .features-list {
            background: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            margin: 30px 0;
        }
        
        .features-list ul {
            list-style: none;
            margin: 15px 0;
        }
        
        .features-list li {
            padding: 8px 0;
            padding-left: 25px;
            position: relative;
            color: #4a5568;
            font-size: 15px;
        }
        
        .features-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #48bb78;
            font-weight: bold;
            font-size: 16px;
        }
        
        .next-steps {
            background: linear-gradient(135deg, #f0fff4 0%, #c6f6d5 100%);
            border: 1px solid #9ae6b4;
            padding: 30px;
            border-radius: 16px;
            margin: 30px 0;
        }
        
        .next-steps h4 {
            color: #22543d;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .next-steps ul {
            color: #276749;
            list-style: none;
        }
        
        .next-steps li {
            padding: 6px 0;
            padding-left: 20px;
            position: relative;
        }
        
        .next-steps li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: #38a169;
            font-weight: bold;
        }
        
        .contact-info {
            background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
            padding: 30px;
            border-radius: 16px;
            margin: 30px 0;
            text-align: center;
            border: 1px solid #cbd5e0;
        }
        
        .contact-info h4 {
            color: #2d3748;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .contact-info p {
            color: #4a5568;
            margin: 8px 0;
        }
        
        .contact-email {
            background: #667eea;
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin: 15px 0;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .notes-section {
            background: linear-gradient(135deg, #fffbf0 0%, #fef5e7 100%);
            border: 1px solid #f6e05e;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
        }
        
        .notes-section h4 {
            color: #744210;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .notes-section p {
            color: #975a16;
            font-style: italic;
        }
        
        .footer {
            text-align: center;
            color: #718096;
            font-size: 14px;
            padding: 40px;
            background: #f7fafc;
        }
        
        .footer p {
            margin: 5px 0;
        }
        
        .signature {
            margin: 30px 0;
            padding: 25px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 12px;
            border-left: 4px solid #667eea;
        }
        
        .signature-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 16px;
        }
        
        .signature-title {
            color: #4a5568;
            font-size: 14px;
            margin-top: 5px;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }
            
            .header, .content {
                padding: 30px 25px;
            }
            
            .summary-grid {
                grid-template-columns: 1fr;
            }
            
            .price-highlight .amount {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="header-content">
                <h1>¡Gracias por confiar en nosotros!</h1>
                <p>Tu cotización personalizada está lista</p>
            </div>
        </div>
        
        <div class="content">
            <div class="greeting">
                Hola {{ $quote->name }}, 👋
            </div>
            
            <div class="intro-text">
                Esperamos que te encuentres muy bien. Nos complace enviarte la cotización detallada para el desarrollo de tu sitio web. Hemos preparado una propuesta personalizada basada en tus requerimientos específicos.
            </div>
            
            <div class="quote-summary">
                <h3>📋 Resumen de tu Proyecto</h3>
                <div class="summary-grid">
                    <div class="summary-item">
                        <div class="summary-label">Tipo de Sitio</div>
                        <div class="summary-value">{{ $quote->website_type_name }}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Páginas</div>
                        <div class="summary-value">{{ $quote->pages }} páginas</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Nivel SEO</div>
                        <div class="summary-value">{{ $quote->seo_level_name }}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Fecha</div>
                        <div class="summary-value">{{ $quote->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
            
            <div class="price-highlight">
                <div class="price-content">
                    <h3>💰 Inversión Total</h3>
                    <div class="amount">${{ number_format($quote->total_price, 0, ',', '.') }}</div>
                    <div class="currency">Pesos Colombianos</div>
                </div>
            </div>
            
            <div class="features-list">
                <h4 style="color: #2d3748; margin-bottom: 15px; font-size: 18px;">📄 Incluye en el PDF adjunto:</h4>
                <ul>
                    <li>Desglose detallado de todos los servicios</li>
                    <li>Especificaciones técnicas completas</li>
                    <li>Cronograma estimado de desarrollo</li>
                    <li>Términos y condiciones del proyecto</li>
                    <li>Información completa de contacto</li>
                </ul>
            </div>
            
            <div class="next-steps">
                <h4>🚀 Próximos Pasos</h4>
                <ul>
                    <li>Revisa cuidadosamente la cotización adjunta en PDF</li>
                    <li>Si tienes preguntas, contáctanos sin compromiso</li>
                    <li>Esta cotización tiene validez de 30 días calendario</li>
                    <li>Podemos personalizar los servicios según tus necesidades</li>
                    <li>Agenda una reunión gratuita para discutir detalles</li>
                </ul>
            </div>
            
            @if($quote->additional_notes)
            <div class="notes-section">
                <h4>📝 Tus Notas Adicionales</h4>
                <p>{{ $quote->additional_notes }}</p>
            </div>
            @endif
            
            <div class="contact-info">
                <h4>💬 ¿Tienes Preguntas?</h4>
                <p>Nuestro equipo está disponible para resolver todas tus dudas</p>
                <a href="mailto:admin@caprietoj.com" class="contact-email">admin@caprietoj.com</a>
                <p><strong>Tiempo de respuesta:</strong> Menos de 24 horas</p>
                <p><strong>Horario de atención:</strong> Lunes a Viernes, 8:00 AM - 6:00 PM</p>
            </div>
            
            <div style="margin: 35px 0; padding: 25px; background: linear-gradient(135deg, #f0fff4 0%, #c6f6d5 100%); border-radius: 12px; text-align: center;">
                <p style="color: #22543d; font-size: 16px; margin: 0;">Agradecemos profundamente tu confianza en nuestros servicios. Estamos emocionados por la posibilidad de trabajar contigo y hacer realidad tu visión digital.</p>
            </div>
            
            <div class="signature">
                <div class="signature-name">El Equipo de Desarrollo Web</div>
                <div class="signature-title">Especialistas en Soluciones Digitales</div>
            </div>
        </div>
        
        <div class="footer">
            <p>🔒 Este correo fue generado de forma segura por nuestro sistema de cotizaciones</p>
            <p>© {{ date('Y') }} Cotizador Web - Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>