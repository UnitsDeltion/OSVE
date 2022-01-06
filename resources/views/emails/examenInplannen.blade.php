<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>OSVE | Deltion college</title>
		<style>
			* {
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				font-size: 100%;
				line-height: 1.6em;
				margin: 0;
				padding: 0;
			}

			body {
				-webkit-font-smoothing: antialiased;
				height: 100%;
				-webkit-text-size-adjust: none;
				width: 100% !important;
			}

			table.body-wrap {
				padding: 20px;
				width: 100%;
			}

			table.body-wrap .container {
				border: 1px solid #f0f0f0;
			}

			table.footer-wrap {
				clear: both !important;
				width: 100%;
			}

			.footer-wrap .container p {
				color: #666666;
				font-size: 12px;
			}

			table.footer-wrap a {
				color: #999999;
			}

			h1,
			h2,
			h3 {
				color: #111111;
				font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
				font-weight: 500;
				line-height: 1.5em;
			}

			h1 {
				font-size: 32px;
				color: #343469;
			}

			h2 {
				font-size: 22px;
				color: #343469;
			}

			/* Voor responsive */
			.container {
				clear: both !important;
				display: block !important;
				margin: 0 auto !important;
				max-width: 600px !important;
			}

			.body-wrap .container {
				padding: 20px;
			}

			.content {
				display: block;
				margin: 0 auto;
				max-width: 600px;
			}

			.content table {
				width: 100%;
			}
		</style>
	</head>

	<body bgcolor="#f3f4f6">
		<!-- body -->
		<table class="body-wrap" bgcolor="#f3f4f6">
			<tr>
				<td></td>
				<td></td>
				<td class="container" bgcolor="#FFFFFF">
					<div class="content">
						<table>
							<tr>
								<td>
									<h1 align="center">OSVE examenregistratie</h1>
								</td>
							</tr>

							<tr>
								<td>
									<img align="left" alt="Deltion College" border="0" src="https://hhhost.nl/images/deltion.png" />
								</td>
							</tr>

							<tr>
								<td>
									<br />

									<table>
										<tr>
											<td>
												<h2 class="mb-0" style="color: #f58220">Student gegevens</h2>
											</td>
										</tr>
										<tr>
											<td>Voornaam</td>
											<td>{{ Session::get('voornaam') }}</td>
										</tr>
										<tr>
											<td>Achternaam</td>
											<td>{{ Session::get('achternaam') }}</td>
										</tr>
										<tr>
											<td>Faciliteitenpas</td>
											<td>{{ Session::get('faciliteitenpas') }}</td>
										</tr>
										<tr>
											<td>Student nummer</td>
											<td>{{ Session::get('studentnummer') }}</td>
										</tr>
										<tr>
											<td>Crebo nummer</td>
											<td>{{ Session::get('crebo_nr') }}</td>
										</tr>
										<tr>
											<td>Opleiding</td>
											<td>{{ Session::get('opleiding') }}</td>
										</tr>
										<tr>
											<td>Vak</td>
											<td>{{ Session::get('vak') }}</td>
										</tr>
										<tr>
											<td>Examen</td>
											<td>{{ Session::get('examen') }}</td>
										</tr>

										<tr>
											<td>
												<br />
												<h2 class="mb-0" style="color: #f58220">Inhoud</h2>
											</td>
										</tr>
										<tr>
											<td>Datum</td>
											<td>{{ Session::get('datum') }}</td>
										</tr>
										<tr>
											<td>Tijd</td>
											<td>{{ Session::get('tijd') }}</td>
										</tr>

									</table>
									<table cellspacing="0" cellpadding="0">
										<tr>
											<td>
												<table cellspacing="0" cellpadding="0">
													<tr>
														<td align="center">
															<br />
															<br />
															<a
																href="http://127.0.0.1:8000/p7?token={{ Session::get('token') }}"
																style="
																	background-color: #33296a;
																	font-size: 18px;
																	font-family: Helvetica, Arial, sans-serif;
																	font-weight: bold;
																	text-decoration: none;
																	padding: 14px 20px;
																	border-radius: 5px;
																	display: inline-block;
																"
															>
																<span style="color: white; border-top: 14px solid #33296a; border-right: 20px solid #33296a; border-bottom: 14px solid #33296a; border-left: 20px solid #33296a">Examen bevestigen</span>
															</a>
															<br />
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<!-- /body -->

		<!-- footer -->
		<table class="footer-wrap">
			<tr>
				<td class="container">
					<div class="content">
						<table>
							<tr>
								<td align="center">
									<p>© Deltion College - <a href="http://www.deltion.nl">www.deltion.nl</a></p>
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<!-- /footer -->
	</body>
</html>
