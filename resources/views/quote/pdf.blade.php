<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización #{{ $quote->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        
        td, th {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        
        .label {
            background-color: #f0f0f0;
            font-weight: bold;
            width: 25%;
        }
        
        .value {
            width: 25%;
        }
        
        .full-width {
            width: 100%;
        }
        
        .center {
            text-align: center;
        }
        
        .right {
            text-align: right;
        }
        
        .items-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .totals-table {
            width: 50%;
            margin-left: auto;
            margin-top: 20px;
        }
        
        .totals-table .label {
            width: 60%;
            text-align: right;
        }
        
        .totals-table .value {
            width: 40%;
            text-align: right;
        }
        
        .signature-section {
            margin-top: 30px;
        }
        
        .signature-table {
            width: 100%;
        }
        
        .signature-table .label {
            width: 20%;
        }
        
        .signature-table .value {
            width: 30%;
        }
        
        .no-border {
            border: none;
        }
        
        .observations {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        COTIZACIÓN DE DESARROLLO WEB
    </div>
    
    <!-- Información básica -->
    <table>
        <tr>
            <td class="label">COTIZACIÓN DE:</td>
            <td class="value">COT-{{ str_pad($quote->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td class="label">FECHA</td>
            <td class="value">{{ $quote->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="label">Consecutivo COT</td>
            <td class="value">COT-{{ str_pad($quote->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td class="no-border"></td>
            <td class="no-border"></td>
        </tr>
    </table>
    
    <!-- Información del proveedor y cliente -->
    <table>
        <tr>
            <td class="label">PROVEEDOR:</td>
            <td class="full-width" colspan="3">{{ strtoupper($quote->name) }}</td>
        </tr>
        <tr>
            <td class="label">NIT/CC:</td>
            <td class="value">{{ $quote->phone ?? 'N/A' }}</td>
            <td class="label">DIRECCIÓN:</td>
            <td class="value">{{ $quote->company ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">TELÉFONO:</td>
            <td class="value">{{ $quote->phone ?? 'N/A' }}</td>
            <td class="label">CIUDAD:</td>
            <td class="value">Bogotá, D.C.</td>
        </tr>
        <tr>
            <td class="label">E-MAIL:</td>
            <td class="value">{{ $quote->email }}</td>
            <td class="label">ENTREGAR EN:</td>
            <td class="value">DESARROLLO WEB</td>
        </tr>
        <tr>
            <td class="label">FORMA DE PAGO:</td>
            <td class="value">Contado</td>
            <td class="label">RESPONSABLE DE LA COMPRA:</td>
            <td class="value">{{ strtoupper($quote->name) }}</td>
        </tr>
        <tr>
            <td class="label">FECHA ENTREGA:</td>
            <td class="value">{{ $quote->created_at->addDays(30)->format('d/m/Y') }}</td>
            <td class="no-border"></td>
            <td class="no-border"></td>
        </tr>
    </table>
    
    <!-- Tabla de ítems -->
    <table class="items-table">
        <thead>
            <tr>
                <th>ÍTEM</th>
                <th>DESCRIPCIÓN</th>
                <th>CANT</th>
                <th>VALOR UNIT</th>
                <th>VALOR TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center">1</td>
                <td>{{ $quote->website_type_name }} - {{ $quote->pages }} páginas<br>
Nivel SEO: {{ $quote->seo_level_name }}<br>
@if($quote->needs_cms)✓ Sistema de administración (CMS)<br>@endif
@if($quote->needs_hosting)✓ Alojamiento web<br>@endif
@if($quote->social_integration)✓ Integración redes sociales<br>@endif
@if($quote->google_analytics)✓ Google Analytics<br>@endif
@if($quote->backup_system)✓ Sistema de respaldo<br>@endif
@if($quote->ssl_certificate)✓ Certificado SSL<br>@endif
@if($quote->maintenance)✓ Mantenimiento mensual<br>@endif
@if($quote->multilanguage)✓ Sitio multi-idioma<br>@endif
</td>
                <td class="center">1</td>
                <td class="right">${{ number_format($quote->total_price, 0, ',', '.') }}</td>
                <td class="right">${{ number_format($quote->total_price, 0, ',', '.') }}</td>
            </tr>
            <!-- Filas vacías para completar el formato -->
            @for($i = 0; $i < 8; $i++)
            <tr>
                <td class="center"></td>
                <td></td>
                <td class="center"></td>
                <td class="right"></td>
                <td class="right"></td>
            </tr>
            @endfor
        </tbody>
    </table>
    
    @if($quote->additional_notes)
    <div class="observations">
        <strong>Observaciones:</strong> {{ $quote->additional_notes }}
    </div>
    @endif
    
    <!-- Sección de presupuesto compartido -->
    <table style="margin-top: 20px;">
        <tr>
            <td class="label">PRESUPUESTO COMPARTIDO:</td>
            <td class="full-width" colspan="3"></td>
        </tr>
    </table>
    
    <!-- Tabla de totales -->
    <table class="totals-table">
        <tr>
            <td class="label">SUB TOTAL</td>
            <td class="value">${{ number_format($quote->total_price * 0.84, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">IVA (19%)</td>
            <td class="value">${{ number_format($quote->total_price * 0.16, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Sin Imp. Consumo</td>
            <td class="value">$0</td>
        </tr>
        <tr>
            <td class="label" style="font-weight: bold;">TOTAL A PAGAR</td>
            <td class="value" style="font-weight: bold;">${{ number_format($quote->total_price, 0, ',', '.') }}</td>
        </tr>
    </table>
    
    <!-- Sección de firmas -->
    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td class="label">APROBACIÓN</td>
                <td class="value">{{ $quote->name }}</td>
                <td class="no-border"></td>
                <td class="no-border"></td>
            </tr>
            <tr>
                <td class="label">FECHA:</td>
                <td class="value">{{ $quote->created_at->format('d/m/Y') }}</td>
                <td class="no-border"></td>
                <td class="no-border"></td>
            </tr>
            <tr>
                <td class="label">PRESUPUESTO:</td>
                <td class="value">Desarrollo Web</td>
                <td class="no-border"></td>
                <td class="no-border"></td>
            </tr>
            <tr>
                <td class="label">SOLICITUD N°:</td>
                <td class="value">COT-{{ str_pad($quote->id, 4, '0', STR_PAD_LEFT) }}</td>
                <td class="no-border"></td>
                <td class="no-border"></td>
            </tr>
        </table>
    </div>
</body>
</html>